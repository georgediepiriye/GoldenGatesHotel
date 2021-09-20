@extends('layouts.adminbase2')
@section('content')

<div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">{{ Str::ucfirst($staff->full_name)}}'s Payments
        <a href="{{ route('admin.staff.payment',['staff_id'=>$staff->id]) }}" style="float: right" class="btn btn-success">Add New</a>
    </h1>
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}

        </div>

    @endif
    <div class="card shadow mb-4">
      
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                 
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>₦{{number_format($payment->amount )}}</td>
                                <td>{{$payment->payment_date }}</td>
                                <td>
                                    <a href="{{ url('admin/staff/payment/delete/'. $payment->id . '/' . $staff->id) }}" class="btn btn-danger" style="margin: 5px"  onclick="confirm('Are you sure you want to delete this payment?')|| event.stopImmediatePropagation()"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

</div>


@endsection