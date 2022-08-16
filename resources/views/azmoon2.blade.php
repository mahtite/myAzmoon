@extends('layouts.master')

@section('title','آزمون')
@section('content')
    @if(auth()->user()->id)
        <div id="zamanx" style="font-size: 20px;
    text-align: center;
    color: #f4623a;
    background: black;
    padding: 20px"></div>
        <form method="post" action="{{ route('azmoon3') }}" id="myform">
            @csrf
    @php
        $i=0;
    @endphp
    @foreach($questions as $question)
       @php
           $i++;
       @endphp

        <table class="table table-striped" style="direction: rtl">

            <tr>
                <td colspan="4" align="right">
                    <label>{{ $i.'-'.' '.$question->q_name }}</label>
                </td>
            </tr>
            <tr>

                <td align="right">
                    <input name="{{ $question->id }}" type="radio" class="answer" value="1" > {{ $question->j1 }}
                </td>
                <td align="right">
                    <input name="{{ $question->id }}" type="radio" class="answer" value="2" > {{ $question->j2 }}
                </td>

                <td align="right">
                    <input name="{{ $question->id }}" type="radio" class="answer" value="3" > {{ $question->j3 }}
                </td>

                <td align="right">
                    <input name="{{ $question->id }}" type="radio" class="answer" value="4" > {{ $question->j4 }}
                </td>
        </table>
    @endforeach

            @php
                $z=$i*$question->zaman
            @endphp

            <div class="row mb-0" style="text-align: center">
               <div>
                   <button class="btn btn-primary">پایان آزمون</button>
               </div>
            </div>

</form>
    @endif
@endsection

@section('script')

    <script src="front/js/jquery.3.2.1.min.js"></script>


    <script>

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    <script>

        zz={{ $z*60 }};

            function zaman()
            {
                ax=document.getElementById("zamanx");
                zz2=Math.floor(zz/60);
                zz3=zz-(zz2*60);
                ax.innerHTML="زمان باقی مانده : "+zz2+":"+zz3;
                zz=zz-1;
                if(zz==0)
                {
                    ax2=document.getElementById("myform");
                    ax2.submit();

                }
                setTimeout(function(){zaman()}, 1000);
            }
            zaman();

    </script>

@endsection
