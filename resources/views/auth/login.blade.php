@extends('layouts.app')
@section('title','ورود')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-18 mb-30">ورود به پنل کاربری</h4>
                </div>

                <div class="card-body">

                    @if($errors->any())
                        <ul class="alert alert-danger" style="list-style-type: none">
                            @foreach( $errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">پست الکترونیکی</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <label for="checkbox">نمایش رمز عبور</label>
                                <input type="checkbox" id="checkbox">

                            </div>
                        </div>

                        <div class="row mb-3" style="text-align: end">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        مرا به یادآور
                                    </label>
                                </div>
                            </div>
                        </div>

                        @recaptcha

                        <div class="row mb-0" style="text-align: center">
                            <div class="">

                                <button type="submit" class="btn btn-primary btnLogin">
                                    ورود
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        رمز عبور خود را فراموش کرده اید؟
                                    </a>
                                @endif

                                <div class="row mt-20">
                                    <div class="col-6">
                                        <!--<a href="" class="btn btn-danger btn-sm"><i class="fa fa-google mr-2"></i><span class="text-center">google</span></a>
                                    -->
                                    </div>
                                </div>

                                <div class="text-center mt-15"><span class="mr-2 font-13 font-weight-bold">اگر ثبت نام نکرده اید؟ </span><a class="font-13 font-weight-bold" href="{{ route('register') }}">ثبت نا م کنید</a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="front/js/jquery.3.2.1.min.js"></script>
    <script src="front/js/showPass.js"></script>
@endsection
