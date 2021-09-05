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
                <form enctype="multipart/form-data" action="{{ route('admin.roomtype.update',['roomtype_id'=>$roomtype->id]) }}" method="POST">
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
                            <th>Gallery</th>
                            <td>
                                <table class="table table-bordered mt-2">
                                    <tr>
                                        <input type="file" multiple name="images[]"/>
                                        @foreach ($roomtype->roomTypeImages as $image )
                                            <td class="imgcol{{ $image->id }}">
                                                <img style="width:100px"  src="{{ $image->image_src }}" alt="#"/>
                                                <p class="mt-2"><button type="button" onclick="return confirm('Are you sure you want to delete this image??')" class="btn btn-danger btn-sm delete-image" data-image-id={{ $image->id }}><i class="fa fa-trash"></i></button></p>
                                            </td>
                                        @endforeach
                                       
                                    </tr>
                                </table>
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
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
        $(".delete-image").on('click',function(){
            var _img_id=$(this).attr('data-image-id');
            var _vm=$(this);
            $.ajax({
                url:"{{url('admin/roomtypeimage/delete')}}/"+_img_id,
                dataType:'json',
                beforeSend:function(){
                    _vm.addClass('disabled');
                },
                success:function(res){
                    if(res.bool==true){
                        $(".imgcol"+_img_id).remove();
                    }
                    _vm.removeClass('disabled');
                }
            });
        });

    });

    </script>
@endsection
@endsection