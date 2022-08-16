@extends('admin.layouts.master')

@section('title','ایجاد شهر')

@section('content')
    <div class="container">


        <div class="row mt-5">

            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h3>شهرستان</h3>
                        <form method="post" action="{{ route('city.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="city">نام شهر</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}"  name="city"  >

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="city">نام استان</label>
                                <select class="form-control @error('state') is-invalid @enderror"  name="state">
                                    @foreach($states as $state )
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                            <button type="submit" class="btn btn-primary mr-2"> ثبت شهرستان</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
