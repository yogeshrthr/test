@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Attribute Management</h3>
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
                                <p class="card-title">Name:{{$attribute['product_name']}}</p>
                                <p class="card-text">Product Color: {{$attribute['product_color']}}</p>
                                <p class="card-text">Product Color: {{$attribute['product_code']}}</p>
                                @if(!empty($attribute['main_image']))
                                <img  width="120" height="150" src="{{url('front/images/productImages/m')}}/{{$attribute['main_image']}}" alt="">
                                <br>
                                @else
                                <img  width="120" height="150" src="{{url('front/images/productImages/s/no_image.png')}}" alt="">
                                @endif
                              
                            </div>
                            
                    </div>
                    <h4 class="mt-2 card-title">Edit Atrrtibutes</h4>
                    <form class="form-horizontal" action="/admin/add-edit-attributes" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$attribute['id']}}">
                        <div class="control-group">
                            <div class="inc">
                                <div class="controls mb-2">
                                    <div style="margin-left:1px;margin-right:1px;" class="row">
                                    <input type="text" class="form-control col-3" name="size[]" placeholder="Size"/>
                                    <input type="number" class="form-control col-3" name="stock[]" placeholder="stock"/>
                                    <input type="number" class="form-control col-2" name="price[]" placeholder="price"/>
                                    <input type="text" class="form-control col-2" name="sku[]" placeholder="sku"/>
                                    <a style="" class="col-2" type="submit" id="append" name="append">
                                    Add </a> 

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                        
                    </form>

                 

                </div>
                

                <div class="container">
                    <h5>Atrrtibutes</h5>
                    
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Sku</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            
                                @foreach($attribute['attribute'] as $index=>$attr)
                                <tr>
                                    <form  method="post" action="/admin/add-edit-attributes/{{$attr['id']}}">@csrf
                                    <input type="hidden" name="product_id" value="{{$attribute['id']}}">
                                        <th scope="row">{{$index+1}}</th>
                                        <!-- <input type="hidden" value="{{$attr['id']}}" name="attr_id[]"> -->
                                        <td><input name=size style="width:50px;" value="{{$attr['size']}}" ></td>
                                        <td><input name=stock style="width:50px;" value="{{$attr['stock']}}" ></td>
                                        <td><input name=price style="width:50px;" value="{{$attr['price']}}" ></td>
                                        <td><input name=sku style="width:50px;" value="{{$attr['sku']}}" ></td>
                                    
                                    <td id="status{{$attr['id']}}">
                                        @if($attr['status']==1)
                                        <i title="Desable"  style="font-size:20px;" status="checked" attribute_id="{{$attr['id']}}"  class="attribute_action mdi mdi-checkbox-marked"></i>
                                        @else
                                        <i title="Enable"  style="font-size:20px;" status="unchecked"  attribute_id="{{$attr['id']}}" class="attribute_action mdi mdi-checkbox-blank-outline"></i>
                                        @endif

                                        <button type="submit" title="Update"  style="border:none;background-color:none; font-size:20px;"    class=" mdi mdi-arrow-up-bold-hexagon-outline"></button>
                                        
                                        
                                    </td>
                                </form>
                                
                            </tr>
                            
                                @endforeach
                                
                                
                            </tbody>
                                
                            
                        </table>
                        <!-- <button class="mdi mdi-arrow-up-bold-hexagon-outline"></button> -->
                        <!-- <button style="float:right" class="mb-2 btn btn-info" type="submit">Update</button> -->
                    
                    
                </div>
            
            </div>
            
        
        </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>


@endsection