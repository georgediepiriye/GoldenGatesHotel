@extends('layouts.adminbase2')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Customers
        <a href="{{ route('admin.createroom') }}" style="float: right" class="btn btn-success">Add New</a>
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
                            <th>Id</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                 
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{Str::ucfirst($customer->full_name) }}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->mobile}}</td>
                                <td>
                                    <a style="margin: 5px" href="{{ route('admin.customer.show',['customer_id'=>$customer->id]) }}"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.customer.edit',['customer_id'=>$customer->id]) }}" class="btn btn-primary" style="margin: 5px"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.customer.delete',['customer_id'=>$customer->id]) }}" class="btn btn-danger" style="margin: 5px"  onclick="confirm('Are you sure you want to delete this customer?')|| event.stopImmediatePropagation()"><i class="fa fa-trash"></i></a>
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