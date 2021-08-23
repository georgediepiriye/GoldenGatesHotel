<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Room Type
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
                            <td><input type="text" wire:model='title' class="form-control" ></td>
                            
                            
                        </tr>
                        <tr >
                        
                            <th>Details</th>
                        <td><textarea  wire:model="details"  class="form-control"></textarea></td>
                            
                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="#" wire:click="addRoomType" class="btn btn-primary">Submit</a>

                            </td>
                        
                        </tr>
                
                        
                    
                    </table>
            </form>
            </div>
            
        </div>
    </div>

</div>
