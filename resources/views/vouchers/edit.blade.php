@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Vouchers</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vouchers.update',$vouchers->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Coupon Code</label>
                            <div class="col-md-6">
                                <script>
                                function changeValue(o) {

                                    var text = "";
                                    var length = 10;

                                    var possible =
                                        "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

                                    for (var i = 0; i < length; i++) {

                                        text += possible.charAt(Math.floor(Math.random() * possible.length));

                                    }
                                    document.getElementById('couponcode').value = text;
                                }
                                </script>

                                <input type="text" id="couponcode" name="couponcode" value="{{$vouchers->couponcode}}"
                                    class="form-control" />
                                <br><button id="technician" class="btn btn-primary" type="button"
                                    onclick="changeValue(this)">Generate</button>

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
                            <label for="brandname" class="col-md-4 col-form-label text-md-right">brand Name</label>

                            <div class="col-md-6">
                                <select name="brand" class="form-control" id="brand">

                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}"> {{$brand->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Discount</label>
                            <div class="col-md-6">
                                <input id="discount" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="discount"
                                    value="{{$vouchers->discount}}" required autofocus>
                            </div>


                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Expiry Date</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="date" value="{{$vouchers->expiry}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="redeemed" class="col-md-4 col-form-label text-md-right">Redeemed</label>

                            <div class="col-md-6">
                                <select name="redeemed" class="form-control" id="redeemed" value="check this">
                                    <option value="No"> No</option>

                                    <option value="Yes"> Yes</option>
                                </select>


                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Voucher
                                </button>
                                &nbsp <a class="btn btn-dark" href="/vouchers">Cancel</a>
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