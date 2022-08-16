@extends('layouts.master')
@section('title','پروفایل کاربر')
@section('content')

    <div class="row">

        <div class="row profileU">
            <h6>
                مشاهده کارنامه
            </h6>

            <div class="col-md-3">
                @include('layouts.profileSidebar')
            </div>

            <div class="col-md-9">
                <table class="table-striped table">
                    <tr>
                        <td>ردیف</td>
                        <td>نام نام خانوادگی </td>
                        <td> تلفن</td>
                        <td>تاریخ تولد</td>
                        <td>کد ملی</td>
                        <td>پست الکترونیکی</td>
                        <td>تعداد سوالات</td>
                        <td>تعداد جواب درست</td>
                        <td>نمره دریافت شده</td>
                    </tr>

                    @php
                        $i=0;
                        $nomre_kol=0;
                    @endphp

                    @foreach($natije as $n)
                        @php $i++; @endphp

                        @if($n["tedad_d"]!=0)
                            @php
                                $nomre=round($n["tedad_d"]*20/$n["tedad_kol"],2);
                            @endphp
                        @else
                            @php
                                $nomre=0;
                            @endphp
                        @endif
                        @php
                            $nomre_kol+=$nomre;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>

                            @foreach ($users as $user)

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->t_tavalod }}</td>
                                <td>{{ $user->codemelli }}</td>
                                <td>{{ $user->email }}</td>

                            @endforeach
                            <td>{{ $n->tedad_kol }}</td>
                            <td>{{ $n->tedad_d }}</td>
                            <td>{{ $nomre }}</td>

                        </tr>
                    @endforeach

                </table>
            </div>

        </div>

    </div>
@endsection
