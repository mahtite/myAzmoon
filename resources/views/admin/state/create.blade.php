@extends('admin.layouts.master')

@section('title','ایجاداستان')

@section('content')
    <div class="container">


        <div class="row mt-5">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h3>استان</h3>
                        <form method="post" action="{{ route('states.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="state">نام استان</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}"  name="state"  >

                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary mr-2">  ثبت استان </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
