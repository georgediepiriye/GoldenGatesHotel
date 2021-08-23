<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Room Type
        <a href="{{ route('admin.roomtypes') }}" style="float: right" class="btn btn-success">View All</a>
    </h1>
     

    <div class="card shadow mb-4">
      
        <div class="card-body">
            <div class="table-responsive">
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <tr >
                    
                        <th>Title</th>
                        <td>{{ Str::ucfirst($roomtype->title ) }}</td>
                        
                        
                    </tr>
                    <tr >
                    
                        <th>Details</th>
                    <td>{{Str::ucfirst($roomtype->details ) }}</td>
                        
                        
                    </tr>
                    
            
                    
                
                </table>
           
            </div>
            
        </div>
    </div>

</div>