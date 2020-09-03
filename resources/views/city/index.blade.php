@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Cities
                <a href="{{route('cities.create')}}" type="button" class="btn btn-primary btn-sm float-right">Add New city</a>
                </div>
                <div class="card-body">

                    <table class="table">


                    <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <th scope="row">{{ $city->id }}</th>
                                    <td>{{ $city->name }}</td>
                                    <td>


                        
                                        
                                         <form action="{{ route('cities.destroy' , $city->id)}}" method="POST">
                                        <a href="{{route('cities.show', $city)}}" class="btn btn-outline-secondary btn-sm">Show</a>
                                        <a href="{{route('cities.edit', $city)}}" class="btn btn-outline-secondary btn-sm">Edit</a>
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
                        {{$cities->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
