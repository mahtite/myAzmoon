@extends('layouts.master')
@section('title','نتیجه آزمون')
@section('content')
    @php
        $i=0;
        $i2=0;

    $questions=\App\Models\Question::all();
    @endphp

    @foreach($questions as $question)
        @php
            $i++;
            $option=$_POST[$question->id];
        //echo $option;
        @endphp
        @if( $option == $question['j_d'] )

            <div class="j" dir=rtl align=right>
                {{$i}} - سوال
                " {{ $question['q_name'] }} "
                با جواب
                ({{ $option }})
                درست می باشد
            </div>

            @php
                $i2++;
            @endphp

        @else
            <div class="jn" dir=rtl align=right>
                {{$i}} - سوال
                " {{ $question->q_name }} "
                با جواب
                ({{ $option }})
                نادرست می باشد
                جواب درست :
                ({{ $question->j_d }})

            </div>
            <br>

        @endif
    @endforeach

    @php
        $natayej=\App\Models\Natije::create([
            'user_id'=>auth()->user()->id,
            'tedad_kol'=>$i,
            'tedad_d'=>$i2,
            'nomre'=>round($i2*20/$i,2)
        ]);
    @endphp
    <hr/>

    <div class="nomre1"> نمره دریافتی شما از این آزمون :
      @php
          $n=($i2*20/$i);
          echo  round($i2*20/$i,2);
      @endphp
    </div>

    @if($n<12)

    <style>
        .nomre1 {
            padding: 15px;
            border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;
            background:red;
            text-align: center;
        }
    </style>
    @else
        <style>
            .nomre1 {
                text-align: center;
                padding: 15px;
                border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;
                background: #01d625;}
        </style>
    @endif

    <center class="baz"> <br><a href="{{ route('karname.show') }}">مشاهده کارنامه</a> </center>
@endsection
