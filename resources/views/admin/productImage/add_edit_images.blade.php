@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Images Management</h3>
                        <a href="{{url('/admin/products')}}"> <i class="mdi mdi-keyboard-backspace"></i></a>
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
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                                  
                    <script>
                            @if(count($errors) > 0)
                                @foreach($errors->all() as $error)
                                    toastr.error("{{ $error }}");
                                @endforeach
                            @endif
                    </script>
                    <div class="card text-center">
                            <div class="card-header">
                                Product Details
                            </div>
                            <div class="card-body">
                                <p class="card-title">Name:{{$productDetails['product_name']}}</p>
                                <p class="card-text">Product Color: {{$productDetails['product_color']}}</p>
                                <p class="card-text">Product Color: {{$productDetails['product_code']}}</p>
                                @if(!empty($productDetails['main_image']))
                                <img  width="120" height="150" src="{{url('front/images/productImages/m')}}/{{$productDetails['main_image']}}" alt="">
                                <br>
                                @else
                                <img  width="120" height="150" src="{{url('front/images/productImages/s/no_image.png')}}" alt="">
                                @endif
                              
                            </div>
                            
                    </div>
                    <h4 class="mt-2 card-title">Add Images</h4>
                    <form class="form-horizontal" enctype="multipart/form-data" action="/admin/add-edit-image/{{$productDetails['id']}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$productDetails['id']}}">
                        <div class="control-group">
                            <input accept="image/png, image/jpeg" class="mb-3 form-control" multiple="" name="images[]" type="file">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        
                        
                    </form>

                 

                </div>
                

                <div class="container">
                    <h5>Images</h5>
                    
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                
                                <th scope="col">Image</th>
                                
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                                @foreach($productDetails['images'] as $index=>$img)
                                <tr>
                                  
                                   
                                    <th scope="row">{{$index+1}}</th>
                                    <!-- <input type="hidden" value="{{$img['id']}}" name="img_id[]"> -->
                                    <td><a target="_blank" href="{{url('front/images/productImages/l')}}/{{$img['name']}}"> <img  style="width:50px;" src="{{url('front/images/productImages/s')}}/{{$img['name']}}"  ></td></a>
                                    
                                
                                    <td id="status{{$img['id']}}">
                                        @if($img['status']==1)
                                        <i title="Desable"  style="font-size:20px;" status="checked" image_id="{{$img['id']}}"  class="image_action mdi mdi-checkbox-marked"></i>
                                        @else
                                        <i title="Enable"  style="font-size:20px;" status="unchecked"  image_id="{{$img['id']}}" class="image_action mdi mdi-checkbox-blank-outline"></i>
                                        @endif

                                        <i title="Delete"  style="font-size:22px;" module_name="image"   module_id="{{$img['id']}}"  class="delete_record mt-3 mdi mdi-bookmark-remove"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                                
                            
                        </table>
                </div>
            
            </div>
            
        
        </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>


@endsection