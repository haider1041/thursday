@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Brand Location</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('brand_locations.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">Brand Name</label>

                            <div class="col-md-6">
                                <select name="brand" class="form-control @error('name') is-invalid @enderror"
                                    id="brand">

                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}"> {{$brand->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">Area Name</label>

                            <div class="col-md-6">
                                <select name="area" class="form-control @error('name') is-invalid @enderror" id="area">

                                    @foreach($areas as $area)
                                    <option value="{{ $area->id }}"> {{$area->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitude</label>

                            <div class="col-md-6">
                                <input id="longitude" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="longitude"
                                    value="{{ old('name') }}" required autofocus>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="latitude" class="col-md-4 col-form-label text-md-right">Latitude</label>

                            <div class="col-md-6">
                                <input id="latitude" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="latitude"
                                    value="{{ old('name') }}" required autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Brand Location
                                </button>
                                &nbsp <a class="btn btn-dark" href="/brand_locations">Cancel</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection