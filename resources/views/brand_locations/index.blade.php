@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Brand Locations
                    <a href="{{route('brand_locations.create')}}" type="button"
                        class="btn btn-primary btn-sm float-right">Add New
                        Location</a>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Area Name</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Latitude</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brand_locations as $brand_location)
                            <tr>
                                <th scope="row">{{ $brand_location->id }}</th>
                                <td>{{ $brand_location->area_id }}</td>
                                <td>{{ $brand_location->brand_id }}</td>
                                <td>{{ $brand_location->longitude }}</td>

                                <td>{{ $brand_location->latitude }}</td>
                                <td>
                                    <form action="{{ route('brand_locations.destroy' , $brand_location->id)}}"
                                        method="POST">
                                        <a href="{{route('brand_locations.show', $brand_location)}}"
                                            class="btn btn-outline-secondary btn-sm">Show</a>
                                        <a href="{{route('brand_locations.edit', $brand_location)}}"
                                            class="btn btn-outline-secondary btn-sm">Edit</a>
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection