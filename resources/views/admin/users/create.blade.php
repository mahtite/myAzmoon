@extends('admin.layouts.master')

@section('style')
    <link type="text/css" rel="stylesheet" href="/front/css/jalalidatepicker.min.css" />
@endsection

@section('title','افزودن کاربر ')
@section('content')
    <div class="col-xl-6 box-margin height-card">
        <div class="card">
            <div class="card-header">ثبت نام</div>

            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">نام و نام خانوادگی</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="codemelli" class="col-md-4 col-form-label text-md-end">کدملی</label>

                        <div class="col-md-6">
                            <input id="codemelli" type="text" class="form-control @error('codemelli') is-invalid @enderror" name="codemelli" value="{{ old('codemelli') }}"  autocomplete="codemelli" >

                            @error('codemelli')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">تلفن</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">نام کاربری</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="" class="col-md-4 col-form-label text-md-end"></label>

                        <div class="col-md-6">

                            <input type="radio" id="s10" name="sex" value="1" /><label for="s10" title="زن">زن</label>
                            <input type="radio" id="s11" name="sex" value="2" /><label for="s11" title="مرد">مرد</label>

                            @error('sex')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="state-dropdown" class="col-md-4 col-form-label text-md-end">استان</label>

                        <div class="col-md-6">
                            <select class="form-control @error('state') is-invalid @enderror" id="state-dropdown" name="state">
                                <option value="">انتخاب استان</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id}}">
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">

                        <label for="city-dropdown" class="col-md-4 col-form-label text-md-end">شهرستان</label>
                        <div class="col-md-6">
                            <select class="form-control @error('city') is-invalid @enderror" id="city-dropdown" name="city">
                            </select>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="t-tavalod" class="col-md-4 col-form-label text-md-end">تاریخ تولد</label>

                        <div class="col-md-6">
                            <input data-jdp  name="t_tavalod" class="form-control @error('t_tavalod') is-invalid @enderror" id="t_tavalod">

                            @error('t_tavalod')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">ایمیل</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">تکرار رمز عبور</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>
                    </div>

                    @recaptcha

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                ثبت نام
                            </button>
                        </div>
                    </div>
                </form>


                <script src="/admin/js/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {

                        $('#state-dropdown').on('change', function() {
                            var state_id = this.value;
                            $("#city-dropdown").html('');
                            $.ajax({
                                url:"{{url('get-cities-by-state')}}",
                                type: "POST",
                                data: {
                                    state_id: state_id,
                                    _token: '{{csrf_token()}}'
                                },
                                dataType : 'json',
                                success: function(result){
                                    $('#city-dropdown').html('<option value="">انتخاب شهرستان</option>');
                                    $.each(result.cities,function(key,value){
                                        $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                                    });
                                }
                            });
                        });
                    });

                </script>

                <script type="text/javascript" src="/front/js/jalalidatepicker.min.js"></script>
                <script src="/front/js/tarikh.js"></script>

            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
