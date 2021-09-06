@extends('layouts.adminbase2')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Staff Departments
        <a href="{{ route('admin.department.create') }}" style="float: right" class="btn btn-success">Add New</a>
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
                            <th>Title</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                 
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ Str::ucfirst($department->title)  }}</td>
                                <td>
                                    <a style="margin: 5px" href="{{ route('admin.show.department',['department_id'=>$department->id]) }}"><i class="fa fa-eye"></i></a>
                                    <a style="margin: 5px" href="{{ route('admin.department.edit',['department_id'=>$department->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a style="margin: 5px" href="{{ route('admin.department.delete',['department_id'=>$department->id]) }}" class="btn btn-danger"  onclick="confirm('Are you sure you want to delete this department?')|| event.stopImmediatePropagation()"><i class="fa fa-trash"></i></a>
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