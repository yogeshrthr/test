@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Banner Management</h3>
                        <a href="{{url('/admin/banners')}}"> <i class="mdi mdi-keyboard-backspace"></i></a>
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
                  <h4 class="card-title">{{$title}}</h4>
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

                  
                  <form class="forms-sample" enctype="multipart/form-data" action="@if(isset($bannerDetails['id'])) /admin/add-edit-banner/{{$bannerDetails['id']}} @else /admin/add-edit-banner @endif" method="post">@csrf
                    <div class="form-group">
                      
                      <label for="image">Image  </label>
                      <select required="" class="sel_col form-control" name="type" id="">
                        <option value="">Select Type</option>
                        <option @if(isset($bannerDetails['type']) && $bannerDetails['type']=='slider') selected="" @endif value="slider">Slider</option>
                        <option @if(isset($bannerDetails['type']) && $bannerDetails['type']=='static') selected="" @endif  value="static">Static</option>
                      </select>
                      </div>
                    <div class="form-group">
                      
                      <label for="image">Image  </label>
                      
                      <input type="file" class="form-control" placeholder="" id="brand_name" name="image">
                      @if(isset($bannerDetails['name']) && !empty($bannerDetails['name'])) <a target="_blank" href="{{url('front/images/bannerImages')}}/{{$bannerDetails['name']}}"  >View Image</a>@endif
                    </div>
                    <div class="form-group">
                      <label for="alt">Alt  </label>
                      <input  required=""  type="text" class="form-control" placeholder="Alt" id="alt" name="alt"  value="@if(isset($bannerDetails['alt'])){{$bannerDetails['alt']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="link">Link  </label>
                      <input  required="" type="text" class="form-control" placeholder="link" id="brand_name" name="link"  value="@if(isset($bannerDetails['link'])){{$bannerDetails['link']}}@endif">
                    </div>
                    <div class="form-group">
                      <label for="title">Title  </label>
                      <input  required="" type="text" class="form-control" placeholder="title" id="title" name="title"  value="@if(isset($bannerDetails['title'])){{$bannerDetails['title']}}@endif">
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