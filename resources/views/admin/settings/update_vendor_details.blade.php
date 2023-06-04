@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
    
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Vendor Details</h3>
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
        @if($id=="personal")
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Vendor Details</h4>
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
                    @foreach($errors->all() as $index=> $error)
                    <li>{{$error}}</li>
                    @endforeach  
                    
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif

                  <form class="forms-sample" enctype='multipart/form-data' action="{{url('admin/update-vendor-details/personal')}}" method="post">@csrf
                    <div class="form-group">
                      <label for="">Username / Email </label>
                      <input type="text" class="form-control" readonly="" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="vendor_name">Vendor Name</label>
                      <input type="text" class="form-control" name="vendor_name" value="{{Auth::guard('admin')->user()->name}}" id="vendor_name" required placeholder="Name">
                      <span id="check_cr_passwrod"></span>
                    </div>
                    <div class="form-group">
                      <label for="vendor_address">Vendor Address</label>
                      <input type="text" class="form-control" name="vendor_address" value="{{$vendorDetails['address']}}" id="vendor_address" required placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="vendor_city">Vendor Address</label>
                      <input type="text" class="form-control" name="vendor_city" value="{{$vendorDetails['city']}}" id="vendor_city" required placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">Vendor State</label>
                      <input type="text" class="form-control" name="vendor_state" value="{{$vendorDetails['state']}}" id="vendor_state" required placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="vendor_country">Vendor Address</label>
                      <input type="text" class="form-control" name="vendor_country" value="{{$vendorDetails['country']}}" id="vendor_country" required placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="vendor_pincode">Vendor Pincode</label>
                      <input type="text" class="form-control" maxlength="6" minlength="6" name="vendor_pincode" value="{{$vendorDetails['pincode']}}" id="vendor_pincode" required placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="vendor_mobile">Mobile</label>
                      <input type="text" class="form-control" minlength="10" maxlength="10" name="vendor_mobile" id="vendor_mobile" required="" value="{{Auth::guard('admin')->user()->mobile}}" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                      <label for="vendor_image">Vendor Image</label>
                      <input type="file" class="form-control" name="vendor_image" id="vendor_image"  >
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
    
        
        @elseif($id=="business")
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Business Details</h4>
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

                  <form class="forms-sample" enctype='multipart/form-data' action="{{url('admin/update-vendor-details/business')}}" method="post">@csrf
                    <div class="form-group">
                      <label for="">Username / Email </label>
                      <input type="text" class="form-control" readonly="" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="shop_name">Shop Name</label>
                      <input type="text"  required="" class="form-control" name="shop_name" value="{{$vendorDetails['shop_name']}}" id="shop_name" required placeholder="Name">
                      <span id="check_cr_passwrod"></span>
                    </div>
                    <div class="form-group">
                      <label for="shop_address">Shop Address</label>
                      <input type="text" class="form-control" name="shop_address" value="{{$vendorDetails['shop_address']}}" id="shop_address" required placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                      <label for="shop_city">Shop City</label>
                      <input type="text" class="form-control" name="shop_city" value="{{$vendorDetails['shop_city']}}" id="shop_city" required placeholder="Name"  required="">
                    </div>
                    <div class="form-group">
                      <label for="shop_state">Shop State</label>
                      <input type="text" class="form-control" name="shop_state" value="{{$vendorDetails['shop_state']}}" id="shop_state" required placeholder="Name"  required="">
                    </div>
                    <div class="form-group">
                      <label for="shop_country">Shop Country</label>
                      <input type="text" class="form-control" name="shop_country" value="{{$vendorDetails['shop_country']}}" id="shop_country" required placeholder="Name"  required="">
                    </div>
                    <div class="form-group">
                      <label for="shop_pincode">Shop Pincode</label>
                      <input type="text" class="form-control" maxlength="6" minlength="6" name="shop_pincode" value="{{$vendorDetails['shop_pincode']}}" id="shop_pincode" required="" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="shop_mobile">Shop Mobile</label>
                      <input type="text" class="form-control" minlength="10" maxlength="10" name="shop_mobile" id="shop_mobile" required="" value="{{$vendorDetails['shop_mobile']}}" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                      <label for="shop_email">Shop Email</label>
                      <input type="email" class="form-control"  name="shop_email" id="shop_email" required="" value="{{$vendorDetails['shop_email']}}" required="" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                      <label for="shop_website">Shop Website</label>
                      <input type="text" class="form-control"  name="shop_website" id="shop_website" required="" value="{{$vendorDetails['shop_website']}}" required="" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                      <label for="business_lic_no">Shop Licence Number</label>
                      <input type="text" class="form-control"  name="business_lic_no" id="business_lic_no" required="" value="{{$vendorDetails['business_license_number']}}"  required="" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                      <label for="gst_number">GSTIN Number</label>
                      <input type="text" class="form-control"  name="gst_number" id="gst_number" required="" value="{{$vendorDetails['gst_number']}}" placeholder="Pan number"  required="">
                    </div>
                    <div class="form-group">
                      <label for="pan_number">Pan Number</label>
                      <input type="text" class="form-control"  name="pan_number" id="pan_number" required="" value="{{$vendorDetails['pan_number']}}" placeholder="gst Number"  required="">
                    </div>
                    <div class="form-group">
                      <label for="address_proof">Address Proof </label>
                        <select class="form-control"   name="address_proof" id="address_proof">
                            <option @if($vendorDetails['address_proof']=='aadnar card') selected="selected" @endif value="aadnar card">Aadhar Card</option>
                            <option @if($vendorDetails['address_proof']=='pan card') selected="selected"  @endif value="pan card">Pan Card</option>
                            <option @if($vendorDetails['address_proof']=='voter card') selected="selected" @endif value="voter card">Voter Card</option>
                            <option @if($vendorDetails['address_proof']=='passport') selected="selected" @endif value="passport">Passport</option>
                            <option @if($vendorDetails['address_proof']=='driving licence') selected="selected" @endif value="driving licence">Driving Licence</option>
                        
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="address_proof_image">Vendor Image</label>
                      <input type="file" class="form-control" name="address_proof_image" id="address_proof_image"  >
                      @if(!empty($vendorDetails['address_proof_image']))
                        <a target="blank" href="{{url('admin/images/photos/proof/'.$vendorDetails['address_proof_image'])}}">View Image</a>
                        @endif
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
        </div>
        
        @else
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Bank Details</h4>
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

                  <form class="forms-sample"  action="{{url('admin/update-vendor-details/bank')}}" method="post">@csrf
                    <div class="form-group">
                      <label for="">Username / Email </label>
                      <input type="text" class="form-control" readonly="" value="{{Auth::guard('admin')->user()->email}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="bank_name">Bank Name</label>
                      <input type="text"  required="" class="form-control" name="bank_name" value="{{$vendorDetails['bank_name']}}" id="bank_name" required placeholder="Name">
                      
                    </div>
                    <div class="form-group">
                      <label for="account_holder_name">Account Holder Name</label>
                      <input type="text" class="form-control" name="account_holder_name" value="{{$vendorDetails['account_holder_name']}}" id="account_holder_name" required placeholder="Name"  required="">
                    </div>
                    <div class="form-group">
                      <label for="account_number">Account Number</label>
                      <input type="text" class="form-control" name="account_number" value="{{$vendorDetails['account_number']}}" id="account_number" required placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                      <label for="confirm_account_number">Confirm Accunt Number</label>
                      <input type="text" class="form-control" name="confirm_account_number" value="{{$vendorDetails['confirm_account_number']}}" id="confirm_account_number" required placeholder="Name"  required="">
                    </div>
                    <div class="form-group">
                      <label for="bank_ifsc_code">Ifsec Code</label>
                      <input type="text" class="form-control" name="bank_ifsc_code" value="{{$vendorDetails['bank_ifsc_code']}}" id="bank_ifsc_code" required placeholder="Name"  required="">
                    </div>
                    
                    
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
        </div>

        @endif
        
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>


@endsection