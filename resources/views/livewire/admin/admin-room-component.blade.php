<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rooms
        <a href="{{ route('admin.createroom') }}" style="float: right" class="btn btn-success">Add New</a>
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
                            <th>Id</th>
                            <th>Room Type</th>
                            <th>Title</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                 
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{Str::ucfirst($room->roomtype->title) }}</td>
                                <td>{{ Str::ucfirst($room->title)  }}</td>
                                <td>
                                   
                                    <a href="{{ route('admin.edit.room',['room_id'=>$room->id]) }}" class="btn btn-primary" style="margin: 5px"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger" style="margin: 5px"  onclick="confirm('Are you sure you want to delete this room?')|| event.stopImmediatePropagation()"  wire:click.prevent="deleteRoom({{ $room->id }})"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

</div>
