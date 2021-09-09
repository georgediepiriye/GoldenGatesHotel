@extends('layouts.adminbase2')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Staff Details
        <a href="{{ route('admin.staffs') }}" style="float: right" class="btn btn-success">View All</a>
    </h1>
     

    <div class="card shadow mb-4">
      
        <div class="card-body">
            <div class="table-responsive">
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <tr >
                        <th>Full name</th>
                        <td>{{ Str::ucfirst($staff->full_name ) }}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img style="width:80px" src="{{ $staff->photo}}" alt="#" /> </td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>{{Str::ucfirst($staff->department->title) }}</td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>{{ $staff->bio}}</td>
                    </tr>
                    <tr>
                        <th>Salary Type</th>
                        <td>{{ $staff->salary_type}}</td>
                    </tr>
                    <tr>
                        <th>Salary Amount</th>
                        <td>₦{{number_format($staff->salary_amount) }}</td>
                    </tr>

                    
                    
            
                    
                
                </table>
           
            </div>
            
        </div>
    </div>

</div>
@endsection