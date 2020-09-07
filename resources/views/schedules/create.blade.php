@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Schedule</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('schedules.store') }}">
                        @csrf



                        <div class="form-group row">
                            <label for="areaname" class="col-md-4 col-form-label text-md-right">Area Name</label>

                            <div class="col-md-6">
                                <select name="area" class="form-control @error('name') is-invalid @enderror" id="area">

                                    @foreach($areas as $area)
                                    <option value="{{ $area->id }}"> {{$area->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">User Name</label>

                            <div class="col-md-6">
                                <select name="user" class="form-control" id="user">

                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}"> {{$user->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control @error('date') is-invalid @enderror"
                                    name="date" value="{{ old('name') }}" required autofocus>
                            </div>
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Schedule
                                </button>
                                &nbsp <a class="btn btn-dark" href="/schedules">Cancel</a>
                            </div>
                        </div>
                    </form>



                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror







                </div>
            </div>
        </div>
        @endsection