@extends('layouts.adminbase2')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Customer Details
        <a href="{{ route('admin.customers') }}" style="float: right" class="btn btn-success">View All</a>
    </h1>
     

    <div class="card shadow mb-4">
      
        <div class="card-body">
            <div class="table-responsive">
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <tr >
                        <th>Full name</th>
                        <td>{{ Str::ucfirst($customer->full_name ) }}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img style="width:100px" src="{{ $customer->photo}}" alt="#" /> </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $customer->email}}</td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td>{{ $customer->mobile}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $customer->address}}</td>
                    </tr>

                    
                    
            
                    
                
                </table>
           
            </div>
            
        </div>
    </div>

</div>
@endsection