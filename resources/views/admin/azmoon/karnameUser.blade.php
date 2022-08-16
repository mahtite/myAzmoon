@extends('admin.layouts.master')
@section('title','مشاهده نمرات')

@section('content')
    <table class="table table-striped">
        <tr>
            <td>ردیف</td>
            <td>نام و نام خانوادگی </td>
            <td>تلفن</td>
            <td>کد ملی </td>
            <td>ایمیل</td>
            <td>تعداد سوالات</td>
            <td>تعداد جواب درست</td>
            <td>نمره دریافت شده</td>
            <td>حذف</td>
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

                @foreach ($user as $u)

                    <td>{{ $u->name }}</td>
                    <td>{{ $u->phone }}</td>

                    <td>{{ $u->codemelli }}</td>

                    <td>{{ $u->email }}</td>

                @endforeach
                <td>{{ $n->tedad_kol }}</td>
                <td>{{ $n->tedad_d }}</td>
                <td>{{ $nomre }}</td>

                <td>
                    <form method="post" action="{{ route('karname.user.del',$u->id) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('آیا برای حذف اطمینان دارید؟')">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
