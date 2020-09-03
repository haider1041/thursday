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


                        
                                        
                                         <form action="{{ route('brands.destroy' , $brand->id)}}" method="POST">
                                        <a href="{{route('brands.show', $brand)}}" class="btn btn-outline-secondary btn-sm">Show</a>
                                        <a href="{{route('brands.edit', $brand)}}" class="btn btn-outline-secondary btn-sm">Edit</a>
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
                        {{$brands->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
