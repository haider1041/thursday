@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Brand</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('brands.store') }}">
                        @csrf
                        
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Brand Name</label>

                            <div class="col-md-6">
                            <input type="text" name="id" value="{{$brands->id}}" visiblity="hidden">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $brands->name }}" required autofocus>

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
                                    Create Brand
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
