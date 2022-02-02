@extends ('backend.layout.template')

@section ('adminBodyContant')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add New Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New Category</li>
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
                <h3 class="card-title">All Category List</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control" required='required'>
                  </div>
                  
                  <div class="form-group">
                    <label>Parent Category</label>
                      <select class="form-control" name="parent_id">
                        <option value="">Please Select A Parent Category If Any</option>
                        @foreach ($primary_category as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="desc" rows="4" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Category Thumbnail</label>
                    <input type="file" name="image" class="form-control-file">
                  </div>
                  
                  <div class="form-group">
                    <input type="submit" name="addCategory" class="btn btn-primary btn-block" value="Add New Category">
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