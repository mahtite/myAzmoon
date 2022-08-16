@extends('admin.layouts.master')
@section('title','مدیریت سوالات')
@section('content')
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">مدیریت سوالات</h4>
                                <a href="{{ route('azmoon.create') }}" class="btn btn-success">ایجاد سوال جدید</a>

                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th> عنوان سوال </th>
                                        <th>گزینه اول</th>
                                        <th>گزینه دوم</th>
                                        <th>گزینه سوم</th>
                                        <th>گزینه چهارم</th>
                                        <th>گزینه درست</th>
                                        <th>زمان</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @if(count($questions)>0)
                                    @foreach($questions as $question)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $question->q_name }}</td>
                                            <td>{{ $question->j1 }}</td>
                                            <td>{{ $question->j2 }}</td>
                                            <td>{{ $question->j3 }}</td>
                                            <td>{{ $question->j4 }}</td>
                                            <td> گزینه ({{ $question->j_d }})</td>
                                            <td>{{ $question->zaman }}</td>
                                            <td class="d-flex">
                                                <form method="post" action="{{ route('azmoon.destroy',$question->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" onclick="return confirm('آیا برای حذف اطمینان دارید؟')">حذف</button>
                                                </form>
                                               <a href="{{ route('azmoon.edit',$question->id) }}" class="btn btn-primary">ویرایش</a>
                                            </td>
                                        </tr>

                                        @php
                                            $i++
                                        @endphp
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <div class="page">
                                    {{ $questions->links() }}
                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div>
        </div>
    </div>
@endsection
