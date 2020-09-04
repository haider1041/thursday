@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    areas
                    <a href="{{route('areas.create')}}" type="button" class="btn btn-primary btn-sm float-right">Add New
                        Area</a>
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
                            @foreach($areas as $area)
                            <tr>
                                <th scope="row">{{ $area->id }}</th>
                                <td>{{ $area->name }}</td>
                                <td>{{ $area->longitude }}</td>
                                <td>{{ $area->latitude }}</td>
                                <td>


                                        <a href="{{route('areas.show', $area)}}"
                                            class="btn btn-outline-secondary btn-sm">Show</a>
                                        <a href="{{route('areas.edit', $area)}}"
                                            class="btn btn-outline-secondary btn-sm">Edit</a>

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
