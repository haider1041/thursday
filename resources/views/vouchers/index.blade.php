@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Vouchers
                    <a href="{{route('vouchers.create')}}" type="button" class="btn btn-primary btn-sm float-right">Add
                        New Voucher</a>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Coupon Code</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Discount</th>


                                <th scope="col">Expiry Date</th>
                                <th scope="col">Redeemed</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vouchers as $voucher)
                            <tr>
                                <th scope="row">{{ $voucher->id }}</th>
                                <td>{{ $voucher->couponcode}}</td>
                                <td>{{ $voucher->user->name}}</td>
                                <td>{{ $voucher->brand->name}}</td>

                                <td>{{ $voucher->discount}}</td>
                                <td>{{ $voucher->expiry}}</td>
                                <td>{{ $voucher->redeemed}}</td>
                                <td>


                                    <a href="{{route('vouchers.edit', $voucher)}}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                    @php
                                    $mainid=$voucher->id

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
                                                <form name="myform" id="myform" action="{{route('vouchers.destroy',$mainid )}}" method="POST">
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

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{$vouchers->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection