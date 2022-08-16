@extends('admin.layouts.master')
@section('title','مشاهده نمرات')

@section('content')
    <table class="table table-striped">
        <tr>
            <td>ردیف</td>
            <td>نام و نام خانوادگی </td>
            <td>تلفن</td>
            <td>کد ملی </td>
            <td>تاریخ تولد</td>
            <td> استان / شهر</td>
            <td>ایمیل</td>
            <td>مشاهده کارنامه</td>
        </tr>
       @php
        $i=0;
       @endphp
        @foreach ($users as $user)
            @php
            $i++;
           @endphp

            <tr>
                <td>{{ $i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->codemelli }}</td>
                <td>{{ $user->t_tavalod }}</td>
                <td>
                    {{ $user->state->name }}/
                    {{ $user->city->name }}
                </td>

                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('karname.user',['user'=>$user->id]) }}">مشاهده کارنامه</a></td>
            </tr>

        @endforeach
    </table>
@endsection
