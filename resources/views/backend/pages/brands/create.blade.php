@extends ('backend.layout.template')

@section ('adminBodyContant')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add New Brands</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New Brands</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


	<section class="content">
	    <div class="container-fluid">
	      <!-- Info boxes -->
	      <div class="row">
	        <div class="col-12 col-sm-12 col-md-12">
	        	
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All Brands List</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Brand Name</label>
                    <input type="text" name=name" class="form-control" required='required' placeholder="Type The Brand Name">
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name=name" class="form-control" required='required' placeholder="Type The Brand Name">
                  </div>
                </form>
                
                
              </div>
              <!-- /.card-body -->
            </div>

	        </div>
	      </div>
	    </div>
	</section>    
</div>        
@endsection