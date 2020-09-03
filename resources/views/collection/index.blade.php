@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Collections
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Bin Name</th>
                                <th scope="col">Weight(Kgs) </th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collections as $collection)
                            <tr>
                                <th scope="row">{{ $collection->id }}</th>
                                <td>{{ $collection->user_id }}</td>
                                <td>{{ $collection->bin_id }}</td>
                                <td>{{ $collection->weight }}</td>
                                <td>{{ $collection->date }}</td>
                                <td>


                                    {{ csrf_field() }}



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