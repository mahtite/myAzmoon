@extends('layouts.master')
@section("title",'آزمون')
@section('content')

    @if(auth()->user()->id)
       <div class="azmoonf">
           <p> برای شرکت در آزمون لطفا روی دکمه (آغاز آزمون) کلیک نمایید</p>
           <p>ودر مدت زمان انتخابی به تمام سوالات پاسخ دهید</p>
           <p>و در پایان کارنامه و نمرات خود را مشاهده نمایید </p>

           <form method="post" action="{{ route('azmoon') }}">
               @csrf
               <button class="btn btn-danger">آغاز آزمون</button>
           </form>
       </div>
    @endif
@endsection
