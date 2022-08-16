@extends('admin.layouts.master')
@section('title','ویرایش سوال')


@section('content')
    <div class="col-xl-6 box-margin height-card">
        <div class="card card-body">
            <h4 class="card-title">ویرایش سوال </h4>
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="row">
                <div class="col-sm-12 col-xs-12">


                    <form method="post" action="{{ route('azmoon.update',$question->id) }}">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="soal">عنوان سوال</label>
                            <textarea name="q_name" id="soal" class="form-control">
                                {{ $question->q_name }}
                             </textarea>
                        </div>

                        <div class="form-group">
                            <label for="j1">گزینه 1</label>
                            <input type="text" class="form-control" value="{{ $question->j1 }}"  name="j1" id="j1" >
                        </div>

                        <div class="form-group">
                            <label for="j2">گزینه 2</label>
                            <input type="text" class="form-control" value="{{ $question->j2 }}"  name="j2" id="j2" >
                        </div>

                        <div class="form-group">
                            <label for="j3">گزینه3</label>
                            <input type="text" class="form-control" value="{{ $question->j3 }}"  name="j3" id="j3" >
                        </div>

                        <div class="form-group">
                            <label for="j4">گزینه4</label>
                            <input type="text" class="form-control" value="{{ $question->j4 }}"  name="j4" id="j4" >
                        </div>

                        <div class="form-group">
                            <label for="j_d">گزینه درست</label>
                            <input type="text" class="form-control" value="{{ $question->j_d }}"  name="j_d" id="j_d" >
                        </div>

                        <div class="form-group">
                            <label for="zaman">زمان سوال(دقیقه)</label>
                            <input type="text" class="form-control" value="{{ $question->zaman }}"  name="zaman" id="zaman" >
                        </div>

                        <button type="submit" class="btn btn-primary mr-2"> ویرایش سوال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
