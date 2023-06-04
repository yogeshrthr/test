@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{Auth::guard('admin')->user()->name}}</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
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
                        <h4 class="card-title">Personal Information</h4>
                        <p class="card-description">
                            Basic form layout
                        </p>
                        
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['name']}}" id="name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" value="{{$vendorDetails['email']}}"id="email"readonly >
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['mobile']}}"id="mobile" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <img src="" alt="">
                            </div>
                            
                            
                       
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bank Detail</h4>
                        <p class="card-description">
                            Basic form layout
                        </p>
                        
                            <div class="form-group">
                                <label for="exampleInputUsername1">Bank Name</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['bank_name']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Account Number</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['account_number']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Account Holder Name</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['account_holder_name']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Ifsc Code</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['bank_ifsc_code']}}" readonly>
                            </div>
                           
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Business Detail</h4>
                        <p class="card-description">
                            Basic form layout
                        </p>
                        
                        
                            <div class="form-group">
                                <label for="name">Shop Name</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_name']}}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Shop Email</label>
                                <input type="email" class="form-control"value="{{$vendorDetails['vendor_business']['shop_email']}}"  readonly >
                            </div>
                            <div class="form-group">
                                <label for="mobile">Shop Mobile</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_mobile']}}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Shop Address</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_address']}}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Shop City</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_city']}}" readonly >
                            </div>
                            <div class="form-group">
                                <label for="mobile">Shop State</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_state']}}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Shop Country</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_country']}}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Shop Pincode</label>
                                <input type="text" class="form-control"  value="{{$vendorDetails['vendor_business']['shop_pincode']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Shop Website</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_website']}}" readonly >
                            </div>
                            <div class="form-group">
                                <label for="mobile">Address Proof</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['address_proof']}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Address Proof Image</label>
                                <img src="" alt="address_proof_image">
                            </div>
                            <div class="form-group">
                                <label for="name">Business Licence Number</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['business_license_number']}}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Gst Number</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['gst_number']}}" readonly >
                            </div>
                            <div class="form-group">
                                <label for="mobile">Pan Number</label>
                                <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['pan_number']}}"  readonly>
                            </div>
                            
                            
                            
                       
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    @include('admin.layout.footer')
</div>
@endsection