@extends('admin.layouts.master')

    @section('style')
        <meta name="csrf-token" content="{{ csrf_token() }}" />


       <!-- <meta charset="utf-8" />
        <meta name="csrf-token" content=" csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Delete Record using Ajax in Laravel 8 - codeanddeploy.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">-->



        <style>
            th,td{text-align: center;}
            button {
                border: none;
                float: left;
                background: no-repeat;
            }
        </style>

    @endsection

    @section('title','مدیریت کاربران')

    @section('content')
        <div class="container">


            @if(Session::get('success', false))
                <?php $data = Session::get('success'); ?>
                @if (is_array($data))
                    @foreach ($data as $msg)
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-check"></i>
                            {{ $msg }}
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check"></i>
                        {{ $data }}
                    </div>
                @endif
            @endif

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control"   placeholder="لطفا کد ملی را وارد کنید" id="search">
                                            <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1">
                                                      <!-- <img src="https://assets.tokopedia.net/assets-tokopedia-  lite/v2/zeus/kratos/af2f34c3.svg" alt="">-->
                                                      <i class="fa fa-search" aria-hidden="true"></i>
                                                  </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-danger" id="multi-delete" data-route="{{ route('users.multi-delete') }}">حذف موارد انتخاب شده</button>

                            <table class="table table-striped table-inverse table-responsive d-table" id="users-table">
                                <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox" class="check-all"></th>
                                    <th>ردیف</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>کد ملی</th>
                                    <th>ایمیل</th>
                                    <th>وضعیت ایمیل</th>
                                    <th>تلفن</th>
                                    <th>تاریخ تولد</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



        <script>
            $('#search').on('keyup', function(){
                search();
            });
            search();
            function search(){
                var keyword = $('#search').val();
                $.post('{{ route("show.User") }}',
                    {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword:keyword
                    },
                    function(data){
                        table_post_row(data);
                        console.log(data);
                    });
            }
            // table row with ajax
            function table_post_row(res){
                let htmlView = '';
                if(res.users.length <= 0){
                    htmlView+= `
       <tr>
          <td colspan="7">کاربر یافت نشد</td>
      </tr>`;
                }

                for(let i = 0; i < res.users.length; i++){

                    htmlView += `
        <tr>
           <td><input type="checkbox" class="check" value="`+res.users[i].id+`"></td>
           <td>`+ (i+1) +`</td>
           <td>`+res.users[i].name+`</td>

           <td>`+res.users[i].codemelli+`</td>
           <td>`+res.users[i].email+`</td>
           <td>
            ${getmark(res.users[i].email_verified_at)}
            </td>
            <td>`+res.users[i].phone+`</td>
            <td>`+res.users[i].t_tavalod+`</td>


           <td>
              <form method="post" action="users/`+res.users[i].id+`">
                 @csrf
                 @method('DELETE')
                 <button onclick="return confirm('آیا برای حذف اطمینان دارید؟')">
                   <i class=" fa fa-trash" aria-hidden=true></i>
                 </button>
              </form>
              <a href="users/`+res.users[i].id+`/edit"><i class=" fa fa-edit" aria-hidden=true></i></a>
              &nbsp;
              <a href="users/roles/`+res.users[i].id+`"><i class=" fa fa-user" aria-hidden=true></i></a>

           </td>
        </tr>`;
                }
                $('tbody').html(htmlView);
            }
        </script>


        <script>

            function getmark(email_verified_at)
            {
                var mark = '';
                if (email_verified_at ){
                    mark = 'فعال'
                } else {
                    mark = 'غیر فعال'
                }
                return mark;
            }

        </script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/admin/js/plugin/TableCheckAll.js"></script>
        <script src="/admin/js/mycode.js"></script>

    @endsection
