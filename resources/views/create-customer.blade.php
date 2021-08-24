@extends('layouts.adminbase2')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Customer
            <a href="{{ route('admin.customers') }}" style="float: right" class="btn btn-success">View All</a>
        </h1>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}

                </div>
            
            @endif

        <div class="card shadow mb-4">
        
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.customer.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                            <tr >
                            
                                <th>Full name <span class="text-danger">*</span></th>
                                <td><input type="text" name="full_name" class="form-control" required ></td>
                                
                                
                            </tr>
                            <tr >
                            
                                <th>Email<span class="text-danger">*</span></th>
                                <td><input type="email" name="email" class="form-control" required></td>
                                
                                
                            </tr>
                            <tr >
                            
                                <th>Password<span class="text-danger">*</span></th>
                                <td><input type="password" name="password" class="form-control" required></td>
                                
                                
                            </tr>
                            <tr>
                            
                                <th>Mobile<span class="text-danger">*</span></th>
                                <td><input type="text" name="mobile" class="form-control" required></td>
                                
                                
                            </tr>
                            <tr>
                            
                                <th>Address<span class="text-danger">*</span></th>
                                <td><input type="text" name="address" class="form-control" required></td>
                            
                            </tr>
                            <tr >
                            
                                <th>Photo<span class="text-danger">*</span></th>
                                <td><input type="file" name="photo" required></td>
                                
                                
                            </tr>
                       
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </td>
                            
                            </tr>
                    
                            
                        
                        </table>
                </form>
                </div>
                
            </div>
        </div>

    </div>


@endsection