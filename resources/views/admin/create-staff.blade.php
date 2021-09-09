@extends('layouts.adminbase2')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Staff
            <a href="{{ route('admin.staffs') }}" style="float: right" class="btn btn-success">View All</a>
        </h1>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}

                </div>
            
            @endif

        <div class="card shadow mb-4">
        
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('admin.staff.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        
                            <tr >
                            
                                <th>Full name <span class="text-danger">*</span></th>
                                <td><input type="text" name="full_name" class="form-control" required ></td>
                                
                                
                            </tr>
                            <tr >
                            
                                <th>Department<span class="text-danger">*</span></th>
                                <td>
                                    <select name="department_id" class="form-control">
                                        <option value="#"><----Select----></option>
                                        @foreach ($departments as $department )
                                            <option value="{{ $department->id }}">{{ $department->title }}</option>
                                        @endforeach
                                        

                                    </select>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <th>Photo<span class="text-danger">*</span></th>
                                <td><input type="file" name="photo" required></td>
                            </tr>
                            <tr>
                            
                                <th>Bio<span class="text-danger">*</span></th>
                                <td><textarea name="bio" class="form-control"></textarea></td>
                                
                                
                            </tr>
                            <tr>
                            
                                <th>Salary Type<span class="text-danger">*</span></th>
                                <td>
                                    <input type="radio" name="salary_type"value="daily"> Daily
                                    <input type="radio" name="salary_type" value="monthly"> Monthly
                                </td>
                            
                            </tr>
                            <tr >
                            
                                <th>Salary Amount<span class="text-danger">*</span></th>
                                <td><input type="number" name="salary_amount" class="form-control" required></td>
                                
                                
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