@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Brand Locations
                    <a href="{{route('brand_locations.create')}}" type="button" class="btn btn-primary btn-sm float-right">Add New
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
                                <td>{{ $brand_location->area->name }}</td>
                                <td>{{ $brand_location->brand->name }}</td>
                                <td>{{ $brand_location->longitude }}</td>

                                <td>{{ $brand_location->latitude }}</td>
                                <td>

                                    <a href="{{route('brand_locations.show', $brand_location)}}" class="btn btn-outline-secondary btn-sm">Show</a>
                                    <a href="{{route('brand_locations.edit', $brand_location)}}" class="btn btn-outline-secondary btn-sm">Edit</a>



                                    @php
                                    $mainid=$brand_location->id

                                    @endphp

                                    <button class="btn btn-danger " data-catid={{$mainid}} data-toggle="modal" data-target="#delete{{$mainid}}">Delete</button>

                                    <div class="modal modal-danger fade" id="delete{{$mainid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" id="{{$mainid}}" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h4 class="modal-title text-center" id="myModalLabel{{$mainid}}">
                                                        Delete
                                                        Confirmation
                                                    </h4>
                                                </div>
                                                <form name="myform" id="myform" action="{{route('brand_locations.destroy',$mainid )}}" method="POST">
                                                    {{csrf_field()}}
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <p class="text-center">
                                                            Are you sure you want to delete?
                                                        </p>
                                                        <input type="hidden" name="_method" value="delete" />

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn btn-success" data-dismiss="modal">No</button>
                                                        <button type="submit" onclick="form_submit()" class="btn btn-danger center">Yes</button>
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