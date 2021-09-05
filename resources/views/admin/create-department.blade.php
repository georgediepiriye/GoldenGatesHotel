@extends('layouts.adminbase2')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Staff Department
        <a href="{{ route('admin.departments') }}" style="float: right" class="btn btn-success">View All</a>
    </h1>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}

            </div>
        
        @endif

    <div class="card shadow mb-4">
      
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('admin.department.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                        <tr >
                        
                            <th>Title</th>
                            <td><input type="text" name="title" class="form-control" ></td>
                            
                            
                        </tr>
            
                        <tr >
                        
                            <th>Details</th>
                        <td><textarea  name="details" class="form-control"></textarea></td>
                            
                            
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