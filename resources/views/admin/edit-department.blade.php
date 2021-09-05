@extends('layouts.adminbase2')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Staff Department
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
                <form enctype="multipart/form-data" action="{{ route('admin.department.update',['department_id'=>$department->id]) }}" method="POST">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                        <tr>
                        
                            <th>Title</th>
                            <td><input type="text" value="{{ $department->title }}" name="title" class="form-control" ></td>
                            {{ $department->title }}
                          
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            
                        </tr>
                        <tr >
                        
                            <th>Details</th>
                            <td><textarea  name="details" value="{{ $department->details }}"  class="form-control">{{ $department->details }}</textarea></td>
                            @error('details')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror 
                            
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