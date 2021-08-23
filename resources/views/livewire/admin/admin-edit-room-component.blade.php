<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Room
        <a href="{{ route('admin.rooms') }}" style="float: right" class="btn btn-success">View All</a>
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
                            <td><input type="text" value="{{ $room->title }}" wire:model='title' class="form-control" ></td>
                            {{ $room->title }}
                          
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            
                        </tr>
                        <tr >
                        
                            <th>Select Room type</th>
                            <td><select wire:model="roomtype_id" value="{{ $room->title }}">
                                    <option value="0" >---Select---</option>
                                    @foreach ($roomtypes as $roomtype )
                                        <option value="{{ $roomtype->id }}">{{ Str::ucfirst($roomtype->title ) }}</option>
                                    @endforeach
                                   
                                </select>
                            </td>
                            
                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="#" wire:click="updateRoom" class="btn btn-primary">Submit</a>

                            </td>
                            
                        </tr>
                
                        
                    
                    </table>
            </form>
            </div>
            
        </div>
    </div>

</div>
