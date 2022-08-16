
    <div class="row" style="width: 100%">

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach( $errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="col-md-6">
            <form class="form-account" action="{{ route('auth.token') }}" method="post">
                @csrf
                <div class="col-sm-12 col-md-6">
                    <div class="form-account-title">کدتایید</div>
                    <div class="form-account-row">
                        <input class="input-field @error('token') is-invalid @enderror" name="token" value="" type="text">
                        @error('token')
                        <span class="invalid-feedback">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button class="btn btn-danger btn-lg">ثبت اطلاعات</button>
                </div>
            </form>
        </div>

    </div>
