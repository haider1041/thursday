@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Schedules
                <a href="{{route('schedules.create')}}" type="button" class="btn btn-primary btn-sm float-right">Add New schedule</a>
                </div>
                <div class="card-body">

                    <table class="table">
                    <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Area Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <th scope="row">{{ $schedule->id }}</th>
                                    <td>{{ $schedule->area_id }}</td>
                                    <td>{{ $schedule->user_id }}</td>
                                    <td>{{ $schedule->date }}</td>
                                    <td>
                                        
                                         <form action="{{ route('schedules.destroy' , $schedule->id)}}" method="POST">
                                        <a href="{{route('schedules.show', $schedule)}}" class="btn btn-outline-secondary btn-sm">Show</a>
                                        <a href="{{route('schedules.edit', $schedule)}}" class="btn btn-outline-secondary btn-sm">Edit</a>
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


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
