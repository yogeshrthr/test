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
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">catalouge Management</h4>
                  <p class="card-description">
                   Products Lists
                  </p>
                  <a href="/admin/add-edit-product" style="float:right;display:inline-block;background-color:#4b49ac;" class="btn btn-primary"> Add  Product</a>
                  <div class="table-responsive pt-3">

                  
                    <table id="products-table" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.</th>
                          <th>Name</th>
                          <th>Product Color</th> 
                           <th>Product Code</th>
                           <th>Image</th>
                           <th>Section</th> 
                           <th>Category</th>
                           <th>Added By</th>
                          <!-- <th>Url</th> -->
                          
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($productsDetails as $index=>$details)
                        
                        <tr>
                          <td>{{$index+1}}</td>
                          <td>{{$details['product_name']}}</td>
                          <td>{{$details['product_color']}}</td>
                          <td>{{$details['product_code']}}</td>
                          @if(!empty($details['main_image']))
                          <td><a target="_blank" href="{{url('front/images/productImages/l')}}/{{$details['main_image']}}"><img src="{{url('front/images/productImages/s')}}/{{$details['main_image']}}" alt=""></a>  </td>
                          @else
                          <td><a target="_blank" href="{{url('front/images/productImages/s/no_image.png')}}"><img src="{{url('front/images/productImages/s/no_image.png')}}" alt=""></a>  </td>
                          @endif
                          <td>{{$details['section']['name']}}</td>
                          <td>{{$details['category']['category_name']}}</td>
                          <td>
                            @if($details['admin_type']=='vendor')
                            <a target="_blank" href="{{url('admin/view-vendor-details')}}/{{$details['admin_id']}}">{{ucfirst($details['admin_type'])}}</a>
                            @else
                            {{ucfirst($details['admin_type'])}}
                            @endif
                          </td>
                          
                          
                          
                          <td id="status{{$details['id']}}">
                            @if($details['status']==1)
                            <i title="Desable"  style="font-size:20px;" status="checked" products_id="{{$details['id']}}"  class="products_action mdi mdi-checkbox-marked"></i>
                            @else
                            <i title="Enable"  style="font-size:20px;" status="unchecked"  products_id="{{$details['id']}}" class="products_action mdi mdi-checkbox-blank-outline"></i>
                            @endif
                          </td>
                          <td>
                          <a style="all: unset" href="/admin/add-edit-product/{{$details['id']}}">
                          <i title="Edit"  style="font-size:20px;" module_name="products"  module_id="{{$details['id']}}"  class="edit_module mdi mdi-pencil-box"></i></a>
                          <a  style="all: unset; cursor:pointer; "href="/admin/add-edit-attributes/{{$details['id']}}">
                          <i title="Add Attributes"  style="font-size:21px;"    module_id="{{$details['id']}}"  class=" mt-3 mdi mdi-plus-box"></i></a>
                          <i title="Delete"  style="font-size:22px;" module_name="products"   module_id="{{$details['id']}}"  class="delete_record mt-3 mdi mdi-bookmark-remove"></i>
                          <a style="all: unset; cursor:pointer; " href="/admin/add-edit-image/{{$details['id']}}">
                          <i title="Add Images"  style="font-size:21px;"      class=" mt-3 mdi mdi-book-plus"></i></a>
                          
                        </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
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