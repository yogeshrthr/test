@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
                        <h6 class="font-weight-normal mb-0"> </h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Admin Details</h4>
                  <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
                  @if(Session::has('error_message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Success:</strong> {{Session::get('error_message')}}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                  @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>success:</strong> {{Session::get('success_message')}}.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                  @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach  
                    
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif

                  <form class="forms-sample" enctype='multipart/form-data' action="update-admin-details" method="post">@csrf
                    <div class="form-group">
                      <label for="">Username / Email </label>
                      <input type="text" class="form-control" readonly="" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    <div class="form-group">
                      <label for="">Admin Type</label>
                      <input type="email" class="form-control" readonly="" value="{{Auth::guard('admin')->user()->type}}">
                    </div>
                    <div class="form-group">
                      <label for="admin_name">Name</label>
                      <input type="text" class="form-control" name="admin_name" value="{{Auth::guard('admin')->user()->name}}" id="admin_name" required placeholder="Name">
                      <span id="check_cr_passwrod"></span>
                    </div>
                    <div class="form-group">
                      <label for="admin_mobile">Mobile</label>
                      <input type="text" class="form-control" minlength="10" maxlength="10" name="admin_mobile" id="admin_mobile" required="" value="{{Auth::guard('admin')->user()->mobile}}" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                      <label for="admin_image">Admin Image</label>
                      <input type="file" class="form-control" name="admin_image" id="admin_image"  >
                      @if(!empty(Auth::guard('admin')->user()->image))
                        <a target="blank" href="{{url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}">View Image</a>
                        @endif
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>


@endsection