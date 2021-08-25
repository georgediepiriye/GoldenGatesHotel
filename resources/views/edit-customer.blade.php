@extends('layouts.adminbase2')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Customer Details
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
                    <form action="{{ route('update',['customer_id'=>$customer->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                            <tr>
                            
                                <th>Full name <span class="text-danger">*</span></th>
                                <td><input type="text" value="{{ $customer->full_name }}" name="full_name" class="form-control" required >
                                    @error('full_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                
                                
                            </tr>
                            <tr>
                            
                                <th>Email<span class="text-danger">*</span></th>
                                <td><input type="email" value="{{ $customer->email }}" name="email" class="form-control" required>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                
                                
                            </tr>
                         
                            <tr>
                            
                                <th>Mobile<span class="text-danger">*</span></th>
                                <td><input type="text" value="{{ $customer->mobile }}" name="mobile" class="form-control" required>
                                    @error('mobile')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                
                                
                            </tr>
                            <tr>
                            
                                <th>Address<span class="text-danger">*</span></th>
                                <td><input type="text" value="{{ $customer->address }}" name="address" class="form-control" required>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                            
                            </tr>
                            <tr >
                            
                                <th>Photo<span class="text-danger">*</span></th>
                                <td>
                                    <input type="file" name="photo">
                                    <input type="hidden" value="{{ $customer->photo }}" name="prev_photo" >
                                    <img style="width:100px" src="{{ $customer->photo}}" alt="#" /> 
                                    @error('photo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('prev_photo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td> 
                                
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