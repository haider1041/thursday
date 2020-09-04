@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    brands
                <a href="{{route('brands.create')}}" type="button" class="btn btn-primary btn-sm float-right">Add New brand</a>
                </div>
                <div class="card-body">
                    <b-button variant="primary">
                        Notifications <b-badge variant="light">4</b-badge>
                      </b-button>

                    <table class="table">


                    <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Joined</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <th scope="row">{{ $brand->id }}</th>
                                    <td>{{ $brand->name }}</td>
                                    <td>Otto</td>
                                    <td>{{ $brand->created_at }}</td>
                                    <td>
                                        <a href="{{route('brands.show', $brand)}}" class="btn btn-outline-secondary btn-sm">Show</a>
                                        <a href="{{route('brands.edit', $brand)}}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                    {{-- @include('_partials.delete_confirmation', ['model'=> $brand, 'route'=> route('brands.destroy'),  "msg"=> "Are you sure you want to delete $brand->name ?"]) --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>

                    <div class="d-flex justify-content-center">
                        {{$brands->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
