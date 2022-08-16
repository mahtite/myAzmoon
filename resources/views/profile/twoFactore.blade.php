@extends('layouts.master')
@section('title','احراز هویت دو مرحله ای')
@section('content')
    <div class="row">

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

                <div class="col-md-8">
                <form class="form-account" action="{{ route('send.twoFactor') }}" method="post">
                    @csrf
                    <div class="col-sm-12 col-md-6">
                        <div class="form-account-title">وضعیت</div>
                        <div class="form-account-row">
                            <select name="type" id="2factor" class="form-control">
                                @foreach(config('twofactor.types') as $key=>$name)
                                    <option value="{{ $key }}" {{ old('type')==$key || auth()->user()->twofactortype==$key ? 'selected':'' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-account-title">شماره موبایل</div>
                        <div class="form-account-row">
                            <input class="input-field form-control" name="phone" value="{{ auth()->user()->phone }}" type="text" placeholder="شماره موبایل خود را وارد نمایید">
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button class="btn btn-danger">ثبت اطلاعات</button>
                    </div>
                </form>
        </div>
            </div>
    </div>
@endsection
