@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Schedules
                    <a href="{{route('schedules.create')}}" type="button" class="btn btn-primary btn-sm float-right">Add
                        New schedule</a>
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
                                <td>{{ $schedule->area->name }}</td>
                                <td>{{ $schedule->user->name }}</td>
                                <td>{{ $schedule->date }}</td>
                                <td>

                                    <a href="{{route('schedules.show', $schedule)}}"
                                        class="btn btn-outline-secondary btn-sm">Show</a>
                                    <a href="{{route('schedules.edit', $schedule)}}"
                                        class="btn btn-outline-secondary btn-sm">Edit</a>


                                    @php
                                    $mainid=$schedule->id

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
                                                    action="{{route('schedules.destroy',$mainid )}}" method="POST">
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