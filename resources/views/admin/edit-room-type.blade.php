@extends('layouts.adminbase2')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Room Type
        <a href="{{ route('admin.roomtypes') }}" style="float: right" class="btn btn-success">View All</a>
    </h1>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}

            </div>
        
        @endif

    <div class="card shadow mb-4">
      
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('admin.roomtype.update',['roomtype_id'=>$roomtype->id]) }}" method="POST">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                        <tr>
                        
                            <th>Title</th>
                            <td><input type="text" value="{{ $roomtype->title }}" name="title" class="form-control" ></td>
                            {{ $roomtype->title }}
                          
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            
                        </tr>
                        <tr >
                        
                            <th>Price</th>
                            <td><input type="text" value="{{ $roomtype->price }}" name="price" class="form-control" ></td>
                            {{ $roomtype->price }}
                          
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            
                        </tr>
                        <tr >
                        
                            <th>Details</th>
                            <td><textarea  name="details" value="{{ $roomtype->details }}"  class="form-control">{{ $roomtype->details }}</textarea></td>
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