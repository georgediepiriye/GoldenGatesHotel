<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Room Types
    <a href="{{ route('admin.createroomtype') }}" style="float: right" class="btn btn-success">Add New</a>
    </h1>
    <div class="card shadow mb-4">
      
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                 
                    <tbody>
                        @foreach ($roomtypes as $roomtype)
                            <tr>
                                <td>{{ $roomtype->id }}</td>
                                <td>{{ Str::ucfirst($roomtype->title)  }}</td>
                                <td>
                                    <a href=""><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.edit.roomtype',['roomtype_id'=>$roomtype->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="3" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

</div>
