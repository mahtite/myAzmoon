@extends('admin.layouts.master')
@section('style')
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

@section('title','مدیریت شهر ')

@section('content')
    <div class="container">


        <div class="row mt-5">

            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h3>نام شهر</h3>

                        <a href="{{ route('city.create') }}" >
                            <i class="fa fa-plus-square" style="color: #0acf97" title="افزودن"></i>
                        </a>

                        <table class="table table-striped table-inverse table-responsive d-table" id="users-table">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام استان</th>
                                <th>نام شهر</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($city as $c)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $c->state->name }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>
                                        <form method="post" action="{{ route('city.destroy',$c->id) }}">

                                            @csrf
                                            @method('delete')
                                            <button>
                                                <i class="fa fa-trash" title="حذف" onclick="return confirm('آیا برای حذف اطمینان دارید؟')"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('city.edit',$c->id) }}">
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

@endsection
