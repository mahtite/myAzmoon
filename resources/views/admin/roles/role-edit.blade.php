@extends('admin.layouts.master')
@section('title','ویرایش نقش ')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container--default .select2-search--inline .select2-search__field{
            text-align: right;
            padding-right: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ویرایش نقش </h4>
                                @if($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach( $errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="{{ route('roles.update',['role'=>$role->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">نام نقش</label>
                                            <input type="text" class="form-control" value="{{ $role->name }}" name="name"  id="exampleInputEmail111" >
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail111">توضیح نقش</label>
                                            <input type="text" class="form-control" value="{{ $role->description }}" name="description"  id="exampleInputEmail111" >
                                        </div>

                                        <div class="form-group">
                                            <label for="myselect">انتخاب مجوز</label>
                                            <select  name="permissions[]"  class="select2-multiple form-control" multiple="multiple"  id="select2Multiple">
                                                @foreach($permissions as $permission)
                                                    <option value="{{ $permission->id }}" {{ in_array($permission->id,$role->permissions()->pluck('id')->toArray())?'selected':'' }}>{{ $permission->name }}-{{ $permission->description }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">ویرایش اطلاعات</button>
                                    </form>
                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->

                    <div class="col-6 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست نقش ها</h4>

                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>  نام نقش  </th>
                                        <th>  توضیح نقش  </th>
                                        <th>  مجوز  </th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->description }}</td>
                                            <td>
                                                @foreach($role->permissions as $permision)
                                                    {{ $permision->description }}-
                                                @endforeach
                                            </td>
                                            <td class="d-flex">
                                                <form method="post" action="{{ route('roles.destroy',['role'=>$role->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" onclick="return confirm('آیا برای حذف اطمینان دارید؟')">حذف</button>
                                                </form>
                                                <a href="{{ route('roles.edit',['role'=>$role->id]) }}" class="btn btn-primary">ویرایش</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script src="admin/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // Select2 Multiple
        $('#select2Multiple').select2({
            placeholder: "",
            allowClear: true
        });
    </script>
@endsection

