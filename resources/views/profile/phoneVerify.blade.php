@extends('layouts.master')
@section('title','احراز هویت دو مرحله ای')
@section('content')
    <div class="row" style="width: 100%">

        @if($errors->any())
            <ul class="alert alert-danger" style="list-style-type: none">
                @foreach( $errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

            <div class="row profileU">

                <h6>
                    احراز هویت
                </h6>

                <div class="col-md-3">
                    @include('layouts.profileSidebar')
                </div>
               <div class="col-md-6">
            <form class="form-account" action="{{ route('phoneVerify') }}" method="post">
                @csrf
                <div class="col-sm-12 col-md-6">
                    <div class="form-account-title">کدتایید</div>
                    <div class="form-account-row">
                        <input class="form-control input-field @error('token') is-invalid @enderror" name="token" value="" type="text">
                        @error('token')
                            <span class="invalid-feedback">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-danger ">ثبت اطلاعات</button>
                </div>
            </form>
        </div>
            </div>

    </div>
@endsection
