@extends('admin.layouts.master')

@section('title','ویرایش استان')

@section('content')
    <div class="container">


        <div class="row mt-5">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h3></h3>
                        <form method="post" action="{{ route('states.update',$state->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="state">نام استان</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" value="{{ $state->name }}"  name="state"  >

                                @error('state')
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
