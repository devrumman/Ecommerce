@extends ('backend.layout.template')

@section ('adminBodyContant')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Update Brands</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Brands</li>
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
                
                <form action="{{route('brands.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" name="name" class="form-control" required='required' value="{{$brand->name}}">
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" rows="4" class="form-control">{{$brand->description}}</textarea>
                  </div>
               
                  <div class="form-group">
                    <label>Brand Logo</label>
                    <br>
                    @if($brand->image == NULL)
                      No Thumbnail Uploded
                    @else
                      <img src="{{asset('backend/img/brands/' . $brand->image)}}" width="100">
                    @endif
                    <br><br>
                    <input type="file" name="image" class="form-control-file">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="updateBrand" class="btn btn-primary btn-block" value="Save Changes">
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