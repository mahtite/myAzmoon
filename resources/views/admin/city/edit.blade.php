@extends('admin.layouts.master')

@section('title','ویرایش شهر')

@section('content')
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h3></h3>
                        <form method="post" action="{{ route('city.update',$city->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="city">نام شهر</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{ $city->name }}"  name="city"  >

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
                                        <option value="{{ $state->id }}" {{ in_array($city->id,$state->cities()->pluck('id')->toArray())? 'selected':'' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary mr-2">ویرایش</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
