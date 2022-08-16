@extends('layouts.master')
@section('title','پروفایل کاربر')
@section('content')

    <div class="row profileU">

        <h6>
            حساب کاربری :
            {{ $user->username }}
        </h6>

        <div class="col-md-3">
           @include('layouts.profileSidebar')
        </div>

        <div class="col-md-9">
            <table class="table table-striped" style="text-align: right;direction: rtl">
                <tr>
                    <td>نام و نام خانوادگی</td>
                    <td>{{ $user->name }}</td>

                    <td>تاریخ تولد</td>
                    <td>{{ $user->t_tavalod }}</td>
                </tr>


                <tr>
                    <td>کد ملی</td>
                    <td>{{ $user->codemelli }}</td>

                    <td>ایمیل</td>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    @php

                        @endphp
                    <td>نام استان</td>
                    <td>{{ $user->state->name }}</td>

                    <td>نام شهرستان</td>
                    <td>{{ $user->city->name }}</td>
                </tr>

                <tr>

                    <td colspan="2">

                        @php
                            $userImage=\App\Models\ProfileUser::where('user_id',auth()->user()->id)->first();
                        @endphp

                        @if(isset($userImage))
                            <img src="\{{ $userImage->image }}" width="40px" style="display: inline">

                            <form action="{{ route('delete.profile',[$userImage->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('delete')
                                <input type="submit" value="حذف تصویر">
                            </form>
                        @else
                            <img src="#" width="40px" style="display: inline">

                        <form action="{{ route('upload.profile') }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                            @csrf
                            <input type="file" name="image">
                            <input type="submit" value="آپلودفایل">
                        </form>
                        @endif
                    </td>

                    <td>شماره همراه</td>
                    <td>{{ $user->phone }}</td>
                </tr>

            </table>
        </div>
    </div>
@endsection
