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
                    
                    @php $i = 1; @endphp
                    @foreach ($brands as $brand)
                    <tr>
                      <th scope="row">{{$i}}</th>
                      <td>{{$brand->name}}</td>
                      <td>{{$brand->desc}}</td>
                      <td class="text-center">
                        @if ($brand->image == NULL)
                          No Thumbnail Uploded
                        @else
                          <img src="{{asset('backend/img/brands/' . $brand->image)}}" width="30" center"alt="">
                        @endif
                      </td>
                      <td>
                        <div class="btn-g">
                          <a href="{{route('brands.edit', $brand->id)}}" class="btn btn-primary btn-sm">Update</a>
                          <a href="" data-toggle="modal" data-target="#deleteBrand{{$brand->id}}" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </td>

                      <!--Delete Start Modal -->
                      <div class="modal fade" id="deleteBrand{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Do You Confirm To Delete This Notic Board Info</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              <div class="modal-button">
                                <ul>
                                  <li>
                                    <form action="{{route('brands.destroy', $brand->id)}}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-danger">Confirm</button>
                                    </form>
                                  </li>
                                  <li>
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--Delete End Modal -->  

                    @php $i++; @endphp
                    @endforeach  
                    @if ( $brands->count() == 0 )
                      <div class="alert alert-info message-info">
                        No Brand Added Yet. Please Add A Brand.
                      </div>
                    @endif  

                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="form-group">
                <button class="btn btn-primary btn-block" onclick="location.href='{{route('brands.create')}}';">Add New Brand</button>
              </div>

              <!-- /.card-body -->
            </div>
	        </div>
	      </div>
	    </div>
	</section>    
</div>        
@endsection