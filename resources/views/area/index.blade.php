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
                                <th scope="col">City</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                            <tr>
                                <th scope="row">{{ $area->id }}</th>
                                <td>{{ $area->name }}</td>
                                <td>{{ $area->city->name }}</td>
                                <td>{{ $area->latitude }}</td>
                                <td>{{ $area->longitude }}</td>

                                <td>


                                    <a href="{{route('areas.show', $area)}}"
                                        class="btn btn-outline-secondary btn-sm">Show</a>
                                    <a href="{{route('areas.edit', $area)}}"
                                        class="btn btn-outline-secondary btn-sm">Edit</a>

                                    @php
                                    $mainid=$area->id

                                    @endphp

                                    <button class="btn btn-danger " data-catid={{$mainid}} data-toggle="modal"
                                        data-target="#delete{{$mainid}}">Delete</button>

                                    <div class="modal modal-danger fade" id="delete{{$mainid}}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" id="{{$mainid}}" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h4 class="modal-title text-center" id="myModalLabel{{$mainid}}">
                                                        Delete
                                                        Confirmation
                                                    </h4>
                                                </div>
                                                <form name="myform" id="myform"
                                                    action="{{route('areas.destroy',$mainid )}}" method="POST">
                                                    {{csrf_field()}}
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <p class="text-center">
                                                            Are you sure you want to delete?
                                                        </p>
                                                        <input type="hidden" name="_method" value="delete" />

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn btn-success"
                                                            data-dismiss="modal">No</button>
                                                        <button type="submit" onclick="form_submit()"
                                                            class="btn btn-danger center">Yes</button>
                                                    </div>
                                                </form>
                                                <script type="text/javascript">
                                                function form_submit() {
                                                    document.getElementById("myform").submit();
                                                }
                                                </script>
                                            </div>
                                        </div>
                                    </div>

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