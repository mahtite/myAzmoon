@extends('admin.layouts.master')
@section('style')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        form{
            display: inline;
        }
        button {
            border: none;
            color: red;
            background: no-repeat;
        }
    </style>
@endsection

@section('title','مدیریت استان')

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

            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        <h3>نام استان</h3>

                        <a href="{{ route('states.create') }}" >
                            <i class="fa fa-plus-square" style="color: #0acf97" title="افزودن"></i>
                        </a>
                        <button class="btn btn-danger" id="multi-deleteS" data-route="{{ route('states.multi-delete') }}">حذف موارد انتخاب شده</button>

                        <table class="table table-striped table-inverse table-responsive d-table" id="state-table">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" class="check-all"></th>
                                <th>ردیف</th>
                                <th>نام استان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($states as $state)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="check" value="{{ $state->id }}">
                                    </td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $state->name }}</td>
                                    <td>
                                        <form method="post" action="{{ route('states.destroy',$state->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="del" onclick="return confirm('آیا برای حذف اطمینان دارید؟')">
                                                <i class="fa fa-trash" title="حذف" ></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('states.edit',$state->id) }}">
                                            <i class="fa fa-edit" title="ویرایش"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php
                                    $i++
                                @endphp
                            @endforeach
                            </tbody>
                           </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/admin/js/plugin/TableCheckAll.js"></script>
    <script src="/admin/js/mycode.js"></script>

@endsection
