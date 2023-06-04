@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Category</h3>
                        <a href="{{url('/admin/category')}}"> <i class="mdi mdi-keyboard-backspace"></i></a>
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
<?php
                  echo "<re>";
                   ?>
                  <form enctype="multipart/form-data" class="forms-sample" action="@if(isset($category['id'])) /admin/add-edit-category/{{$category['id']}} @else /admin/add-edit-category @endif" method="post">@csrf
                    <div class="form-group">
                      <label for="sectionName">Category Name  </label>
                      <input required type="text" class="form-control" placeholder="Category name" id="category_name" name="sectionName"  value="@if(isset($category['category_name'])){{$category['category_name']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="categorySection">Select Section  </label>
                      <select id="change_section" class="form-control" name="categorySection" id="categorySection">
                        @foreach($section as  $value)
                        
                            @if($value['id']==$category['section_id'])
                            <option category_id="{{$category['id']}}" selected="selected" value="{{$value['id']}}">{{$value['name']}}</option>
                            @else
                            <option category_id="{{$category['id']}}" value="{{$value['id']}}">{{$value['name']}}</option>
                            @endif
                        @endforeach  
                      
                      </select>
                    </div>
                    <div id="categoryLevel">
                    @include('admin.category.add-category-level')

                    </div>
                    <!-- <div class="form-group">
                      
                      
                        
                      
                    </div> -->
                    <div class="form-group">
                      <label for="category_name">Category Image  </label>
                      <input type="file"  class="form-control"  id="category_name" name="sectionImage"  value="">
                      @if(isset($category['category_name']))<a class="mt-1" target="_blank" href="{{url('front/images/categoryImages')}}/{{$category['category_image']}}">View Image</a>@endif
                        
                    </div>
                    <div class="form-group">
                      <label for="category_discount">Category Descount  </label>
                      <input  type="number" class="form-control" placeholder="Category Descount" id="category_discount" name="category_discount"  value="@if(isset($category['category_discount'])){{$category['category_discount']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="description">Category Description  </label>
                      <textarea  required class="form-control" name="description" id="description" cols="3" rows="" >@if(isset($category['description'])){{$category['description']}}@endif</textarea>
                    </div>
                    <div class="form-group">
                      <label for="url">Category Url  </label>
                      <input required type="text" class="form-control" placeholder="Category url" id="url" name="url"  value="@if(isset($category['url'])){{$category['url']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="meta_title	">Category Meta Title  </label>
                      <input required type="text" class="form-control" placeholder="Category Meta Title" id="meta_title" name="meta_title"  value="@if(isset($category['meta_title'])){{$category['meta_title']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="meta_description">Category Meta Description  </label>
                      <input required type="text" class="form-control" placeholder="Category Meta Description" id="meta_description" name="meta_description"  value="@if(isset($category['meta_description'])){{$category['meta_description']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="meta_keywords">Category Meta Keyword  </label>
                      <input required type="text" class="form-control" placeholder="Category Meta Description" id="meta_keywords" name="meta_keywords"  value="@if(isset($category['meta_keywords'])){{$category['meta_keywords']}}@endif">
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