@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Brand Locations
                    <a href="{{route('brand_locations.create')}}" type="button"
                        class="btn btn-primary btn-sm float-right">Add
                        New Brand Location</a>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Area Name</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Latitude</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brand_locations as $brand_location)
                            <tr>
                                <th scope="row">{{ $brand_location->id }}</th>
                                <td>{{ $brand_location->area_id }}</td>
                                <td>{{ $brand_location->longitude }}</td>

                                <td>{{ $brand_location->latitude }}</td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Vouchers
                    <a href="{{route('vouchers.create')}}" type="button" class="btn btn-primary btn-sm float-right">Add
                        New Voucher</a>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Coupon Code</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Discount</th>


                                <th scope="col">Expiry Date</th>
                                <th scope="col">Redeemed</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vouchers as $voucher)
                            <tr>
                                <th scope="row">{{ $voucher->id }}</th>
                                <td>{{ $voucher->couponcode}}</td>
                                <td>{{ $voucher->user_id}}</td>
                                <td>{{ $voucher->discount}}</td>
                                <td>{{ $voucher->expiry}}</td>
                                <td>{{ $voucher->redeemed}}</td>
                                <td>


                                    <form action="{{ route('vouchers.destroy' , $voucher->id)}}" method="POST">

                                        <a href="{{route('vouchers.edit', $voucher)}}"
                                            class="btn btn-outline-secondary btn-sm">Edit</a>
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{$vouchers->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection