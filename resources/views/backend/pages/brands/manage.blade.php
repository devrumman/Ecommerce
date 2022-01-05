@extends ('backend.layout.template')

@section ('adminBodyContant')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage All Brands</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Brands</li>
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
                
                <table class="table table-dark table-hover table-bordered table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#Sl.</th>
                      <th scope="col">Brand Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Image</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    
                    @php
                      $i = 1;
                    @endphp  

                    @foreach ($brands as $brand)
                    <tr>
                      <th scope="row">{{$i}}</th>
                      <td>{{$brand->name}}</td>
                      <td>{{$brand->desc}}</td>
                      <td>
                        @if ($brand->image == NULL)
                          No Thumbnail Uploded
                        @else
                          <img src="{{asset('backend/img/brands' . $brand->image)}}" alt="">
                        @endif
                      </td>
                      <td>
                        <div class="btn-g">
                          <a href="" class="btn btn-primary btn-sm">Update</a>
                          <a href="" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </td>

                      @php
                      $i++;
                      @endphp  

                    @endforeach  

                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

	        </div>
	      </div>
	    </div>
	</section>    
</div>        
@endsection