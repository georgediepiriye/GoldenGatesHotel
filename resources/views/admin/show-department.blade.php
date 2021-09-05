@extends('layouts.adminbase2')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Department
        <a href="{{ route('admin.departments') }}" style="float: right" class="btn btn-success">View All</a>
    </h1>
     

    <div class="card shadow mb-4">
      
        <div class="card-body">
            <div class="table-responsive">
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <tr >
                    
                        <th>Title</th>
                        <td>{{ Str::ucfirst($department->title ) }}</td>
                        
                        
                    </tr>
              
                    <tr >
                    
                        <th>Details</th>
                    <td>{{Str::ucfirst($department->details ) }}</td>
                        
                        
                    </tr>
       
   
                </table>
           
            </div>
            
        </div>
    </div>

</div>
@endsection