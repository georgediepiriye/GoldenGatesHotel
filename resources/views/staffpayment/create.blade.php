@extends('layouts.adminbase2')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add {{Str::ucfirst($staff->full_name)  }}'s Payment 
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
                    <form action="{{ route('admin.staff.payment',['staff_id'=>$staff->id]) }}" method="post" >
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                            <tr >
                            
                                <th>Amount<span class="text-danger">*</span></th>
                                <td><input type="number" name="amount" class="form-control" required ></td>
                                
                                
                            </tr>
                            <tr>
                            
                                <th>Date<span class="text-danger">*</span></th>
                                <td><input type="date" name="payment_date" class="form-control" required></td>
                                
                                
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