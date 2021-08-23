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
                <form action="#" method="post ">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                        <tr >
                        
                            <th>Title</th>
                            <td><input type="text" value="{{ $roomtype->title }}" wire:model='title' class="form-control" ></td>
                            {{ $roomtype->title }}
                          
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            
                        </tr>
                        <tr >
                        
                            <th>Details</th>
                            <td><textarea  wire:model="details" value="{{ $roomtype->details }}"  class="form-control"></textarea></td>
                            @error('details')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror 
                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="#" wire:click="updateRoomType" class="btn btn-primary">Submit</a>

                            </td>
                            
                        </tr>
                
                        
                    
                    </table>
            </form>
            </div>
            
        </div>
    </div>

</div>
