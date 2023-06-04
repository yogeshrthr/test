@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Product Management</h3>
                        <a href="{{url('/admin/products')}}"> <i class="mdi mdi-keyboard-backspace"></i></a>
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
                  <h3 class="card-title">{{$title}}</h4>
                  <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
                 
                    <script>
                            @if(count($errors) > 0)
                                @foreach($errors->all() as $error)
                                    toastr.error("{{ $error }}");
                                @endforeach
                            @endif
                    </script>

                
                  <form enctype="multipart/form-data" class="forms-sample" action="@if(isset($products['id'])) /admin/add-edit-product/{{$products['id']}} @else /admin/add-edit-product @endif" method="post">@csrf
                    
                    <div class="form-group">
                      <label for="category_id">Select Category  </label>
                      <select   class="sel_col form-control " name="category_id"  id="category_id">
                        @foreach($productsDetails as $section)
                            <optgroup label="{{$section['name']}}">
                            @foreach($section['category'] as $category)
                                <option @if(isset($products['category_id']) && $products['category_id']==$category['id']) selected=""  @endif section_id="{{$section['id']}}" value="{{$category['id']}}">--&nbsp;{{$category['category_name']}}
                                    
                                @foreach($category['sub_category'] as $subcategory)
                                <option @if(isset($products['category_id']) && $products['category_id']==$subcategory['id']) selected="" @endif  section_id="{{$section['id']}}" value="{{$subcategory['id']}}">&nbsp;&nbsp;-&nbsp;&nbsp;{{$subcategory['category_name']}}
                                </option>
                        
                                @endforeach
                                   
                                </option>
                        
                            @endforeach
                            
                            </optgroup>
                            
                        @endforeach
                      </select>
                    </div>
                    <input type="hidden" value="@if(isset($products['section_id'])) {{$products['section_id']}} @else 2 @endif" name="section_id" id="section_id">
                    <div class="form-group">
                        <label for="brand_id">Select Brand</label>
                        <select  class="sel_col form-control" name="brand_id" id="">
                        <option value="">Select Brand
                                </option>
                            @foreach($brands as $brand)
                                <option @if(isset($products['brand_id']) && $products['brand_id']==$brand['id']) selected="" @endif value="{{$brand['id']}}">{{$brand['name']}}
                                </option>
                        
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="productName">Product Name  </label>
                      <input required type="text" class="form-control" placeholder="Product name" id="product_name" name="productName"  value="@if(isset($products['product_name'])){{$products['product_name']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="product_code">Product Code </label>
                      <input required type="text" class="form-control" placeholder="Product Code" id="product_code" name="product_code"  value="@if(isset($products['product_code'])){{$products['product_code']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="product_color">Product Color </label>
                      <input required type="text" class="form-control" placeholder="Product Color" id="product_color" name="product_color"  value="@if(isset($products['product_color'])){{$products['product_color']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="product_price">Product Price </label>
                      <input required type="number" class="form-control" placeholder="Product Price" id="product_price" name="product_price"  value="@if(isset($products['product_price'])){{$products['product_price']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="product_discount">Product Descount (%)</label>
                      <input  type="number" class="form-control" placeholder="Category Descount" id="product_discount" name="product_discount"  value="@if(isset($products['product_discount'])){{$products['product_discount']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="product_weight">Product Weight</label>
                      <input required type="number" class="form-control" placeholder="Product Weight" id="product_weight" name="product_weight"  value="@if(isset($products['product_weight'])){{$products['product_weight']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="meta_title	">Meta Title  </label>
                      <input required type="text" class="form-control" placeholder="Product Meta Title" id="meta_title" name="meta_title"  value="@if(isset($products['meta_title'])){{$products['meta_title']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="meta_description">Meta Description  </label>
                      <textarea  required class="form-control" name="meta_description" id="meta_description" cols="3" rows="" >@if(isset($products['meta_description'])){{$products['meta_description']}}@endif</textarea>
                     
                    </div>
                    
                    <div class="form-group">
                      <label for="description">Product Description  </label>
                      <textarea  required class="form-control" name="description" id="description" cols="3" rows="" >@if(isset($products['description'])){{$products['description']}}@endif</textarea>
                    </div>
                    <div class="form-group">
                      <label for="meta_keywords">Meta Keyword  </label>
                      <input required type="text" class="form-control" placeholder="Category Meta Description" id="meta_keywords" name="meta_keywords"  value="@if(isset($products['meta_keywords'])){{$products['meta_keywords']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="main_image">Product Image  </label>
                      <input type="file"  class="form-control"  id="main_image" name="main_image"  value="">
                      @if(isset($products['main_image']))<a class="mt-1" target="_blank" href="{{url('front/images/productImages/l')}}/{{$products['main_image']}}">View Image</a>@endif
                        
                    </div>
                    <div class="form-group">
                      <label for="product_video">Product Video</label>
                      <input type="file"  class="form-control"  id="product_video" name="product_video"  value="">
                      @if(!empty($products['product_video']))<a class="mt-1" target="_blank" href="{{url('front/vdo/productVdo')}}/{{$products['product_video']}}">View Video</a>@endif
                        
                    </div>
                    <div class="form-group">
                      <label for="is_featured">Is Featured &nbsp;</label>
                      <input type="checkbox"  class=""  id=""  name="is_featured"  value="yes" 
                      @if(isset($products['is_featured']) && $products['is_featured'] =='yes') checked=""  @endif>
                        
                    </div>
                    <div class="form-group">
                      <label for="is_bestseller">Is BestSeller &nbsp;</label>
                      <input type="checkbox"  class=""  id=""  name="is_bestseller"  value="yes" 
                      @if(isset($products['is_bestseller']) && $products['is_bestseller'] =='yes') checked=""  @endif>
                        
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