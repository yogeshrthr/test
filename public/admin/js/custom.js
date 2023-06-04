$(document).ready(function(){
        $('#data-table').DataTable();
        $('#category-table').DataTable();
        $('#brands-table').DataTable();
        $('#products-table').DataTable();                
        $('#banners-table').DataTable();                
        
    
    $(".nav-item").removeClass('active')
    $(".collapse").removeClass('show')
    
    $('#current_password').keyup(function(){
        var current_pas=$('#current_password').val();
        console.log(current_pas);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'/admin/check-admin-password',
                data:{current_password:current_pas},
                success:function(resp){
                    if(resp=="false"){
                        $('#check_cr_passwrod').html("<font color='red'> Current Password is Incorrect</font>");
                    }else{
                        $('#check_cr_passwrod').html("<font color='green'> Current Password is Correct</font>");
                    }
                    console.log(resp);
                },error:function(){
                    console.log('something went wrong');
                }
            })
        })
    $(document).on('click','.action',function(e){
        var status=$(this).attr('status');
        var admin_id=$(this).attr('admin_id');
        console.log(admin_id,status)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-admin-status',
            data:{'admin_id':$(this).attr('admin_id'),'status':status},
            success:function(resp){
                
                if(status=='checked'){
                    console.log(resp)
                    $('#status'+admin_id).html('<i title="Enable"  style="font-size:20px;" status="unchecked"  admin_id="'+admin_id+'" class="action mdi mdi-checkbox-blank-outline"></i>');
                   
                }else{
                    $('#status'+admin_id).html('<i title="Desable"  style="font-size:20px;" status="checked"  admin_id="'+admin_id+'"  class="action mdi mdi-checkbox-marked"></i>');
                }
                
                
            },
            error:function(){
                console.log("resp");
            }
        })
        
        
    })
    $(document).on('click','.section_action',function(e){
        var section_status=$(this).attr('status');
        var section_id=$(this).attr('section_id');
        console.log(section_id,section_status)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-section-status',
            data:{'section_id':$(this).attr('section_id'),'status':section_status},
            success:function(resp){
                
                if(section_status=='checked'){
                    console.log(resp)
                    $('#status'+section_id).html('<i title="Enable"  style="font-size:20px;" status="unchecked"  section_id="'+section_id+'" class="section_action mdi mdi-checkbox-blank-outline"></i>');
                   
                }else{
                    $('#status'+section_id).html('<i title="Desable"  style="font-size:20px;" status="checked"  section_id="'+section_id+'"  class="section_action mdi mdi-checkbox-marked"></i>');
                }
                toastr.success("Status changed successfully");
                
                
            },
            error:function(){
                console.log("resp");
            }
        })
        
        
    })
    // forr delete record using this function all the mudule
    $(document).on('click','.delete_record',function(e){
        let mocule_name=$(this).attr('module_name');
        let module_id=$(this).attr('mocule_id');
        
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'post',
                    url:'/admin/delete-'+mocule_name,
                    data:{'module_id':$(this).attr('module_id')},
                    success:function(resp,data){ 
                        
                        
                    },
                    error:function(){
                        toastr.error("Something Went wrong!!");
                        // console.log("resp");
                    }
                        
                    
                });
                if($(this).attr('module_name')=='image'){
                    window.location.reload();
                }else{
                    window.location.href="/admin/"+$(this).attr('module_name');
                }
                
            //   swalWithBootstrapButtons.fire(
            //     'Deleted!',
            //     'Your file has been deleted.',
            //     'success',
                
            //   )
            
              
             
              
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
          })
        
    })
    // get section_id when we add new product we need this 
    $(document).on('change','#category_id',function(e){
      $('#section_id').val($(this).find('option:selected').attr('section_id'));    
    })
    // banners chage status
    $(document).on('click','.category_action',function(e){
        var category_status=$(this).attr('status');
        var category_id=$(this).attr('category_id');
        console.log(category_id,category_status)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-category-status',
            data:{'category_id':$(this).attr('category_id'),'status':category_status},
            success:function(resp){
                
                if(category_status=='checked'){
                    console.log(resp)
                    $('#status'+category_id).html('<i title="Enable"  style="font-size:20px;" status="unchecked"  category_id="'+category_id+'" class="category_action mdi mdi-checkbox-blank-outline"></i>');
                   
                }else{
                    $('#status'+category_id).html('<i title="Desable"  style="font-size:20px;" status="checked"  category_id="'+category_id+'"  class="category_action mdi mdi-checkbox-marked"></i>');
                }
                toastr.success("Status changed successfully");
                
                
            },
            error:function(){
                console.log("resp");
            }
        })
        
        
    })
    // category chage status
    $(document).on('click','.banner_action',function(e){
        var banner_status=$(this).attr('status');
        var banner_id=$(this).attr('banner_id');
        console.log(banner_id,banner_status)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-banner-status',
            data:{'banner_id':$(this).attr('banner_id'),'status':banner_status},
            success:function(resp){
                
                if(banner_status=='checked'){
                    console.log(resp)
                    
                    $('#status'+banner_id).html('<i title="Enable"  style="font-size:20px;" status="unchecked"  banner_id="'+banner_id+'" class="banner_action mdi mdi-checkbox-blank-outline"></i>');
                   
                }else{
                    
                    $('#status'+banner_id).html('<i title="Desable"  style="font-size:20px;" status="checked"  banner_id="'+banner_id+'"  class="banner_action mdi mdi-checkbox-marked"></i>');
                }
                toastr.success("Status changed successfully");
                
                
            },
            error:function(){
                console.log("resp");
            }
        })
        
        
    })
    // change section and get category level
    $(document).on('change','#change_section',function(e){
        // alert()
        // console.log($(this).val(),$(this).find('option:selected').attr('category_id'))
        // return false
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/get-category-level',
            data:{'section_id':$(this).val(),category_id:$(this).find('option:selected').attr('category_id')},
            success:function(resp){
                console.log(resp)
                
                $("#categoryLevel").html(resp)                
             },
            error:function(){
                toastr.error("Something Went wrong!!");
                // console.log("resp");
            }
        })
        
        
    })
    // brands chage status
    $(document).on('click','.brands_action',function(e){
        var brands_status=$(this).attr('status');
        var brands_id=$(this).attr('brands_id');
        console.log(brands_id,brands_status)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-brands-status',
            data:{'brands_id':$(this).attr('brands_id'),'status':brands_status},
            success:function(resp){
                
                if(brands_status=='checked'){
                    console.log(resp)
                    $('#status'+brands_id).html('<i title="Enable"  style="font-size:20px;" status="unchecked"  brands_id="'+brands_id+'" class="brands_action mdi mdi-checkbox-blank-outline"></i>');
                   
                }else{
                    $('#status'+brands_id).html('<i title="Desable"  style="font-size:20px;" status="checked"  brands_id="'+brands_id+'"  class="brands_action mdi mdi-checkbox-marked"></i>');
                }
                toastr.success("Status changed successfully");
                
                
            },
            error:function(){
                console.log("resp");
            }
        })
        
        
    })
    // products chage status
    $(document).on('click','.products_action',function(e){
       
        var product_status=$(this).attr('status');
        var product_id=$(this).attr('products_id');
        console.log(product_id,product_status)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-products-status',
            data:{'products_id':product_id,'status':product_status},
            success:function(resp){
                console.log(resp)
                if(product_status=='checked'){
                    console.log(resp)
                    $('#status'+product_id).html('<i title="Enable"  style="font-size:20px;" status="unchecked"  products_id="'+product_id+'" class="products_action mdi mdi-checkbox-blank-outline"></i>');
                   
                }else{
                    $('#status'+product_id).html('<i title="Desable"  style="font-size:20px;" status="checked"  products_id="'+product_id+'"  class="products_action mdi mdi-checkbox-marked"></i>');
                }
                toastr.success("Status changed successfully");
                
                
            },
            error:function(){
                console.log("resp");
            }
        })
        
        
    })
    // products images status
    $(document).on('click','.image_action',function(e){
       
        var image_status=$(this).attr('status');
        var image_id=$(this).attr('image_id');
        console.log(image_id,image_status)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-image-status',
            data:{'image_id':image_id,'status':image_status},
            success:function(resp){
                console.log(resp)
                if(image_status=='checked'){
                    console.log(resp)
                    $('#status'+image_id).html('<i title="Enable"  style="font-size:20px;" status="unchecked"  image_id="'+image_id+'" class="image_action mdi mdi-checkbox-blank-outline"></i><i title="Delete"  style="font-size:22px;" module_name="image"   module_id="'+image_id+'"  class="delete_record mt-3 mdi mdi-bookmark-remove"></i>');
                   
                }else{
                    $('#status'+image_id).html('<i title="Desable"  style="font-size:20px;" status="checked"  image_id="'+image_id+'"  class="image_action mdi mdi-checkbox-marked"></i> <i title="Delete"  style="font-size:22px;" module_name="image"   module_id="'+image_id+'"  class="delete_record mt-3 mdi mdi-bookmark-remove"></i>');
                }
                toastr.success("Status changed successfully");
                
                
            },
            error:function(){
                console.log("resp");
            }
        })
        
        
    })
     // attribute chage status
     $(document).on('click','.attribute_action',function(e){
        
        var attribute_status=$(this).attr('status');
        var attribute_id=$(this).attr('attribute_id');
        console.log(attribute_id,attribute_status)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/update-attribute-status',
            data:{'attribute_id':attribute_id,'status':attribute_status},
            success:function(resp){
                console.log(resp)
                if(attribute_status=='checked'){
                    console.log(resp)
                    $('#status'+attribute_id).html('<i title="Enable"  style="font-size:20px;" status="unchecked"  attribute_id="'+attribute_id+'" class="attribute_action mdi mdi-checkbox-blank-outline"></i><button type="submit" title="Update"  style="border:none;background-color:none; font-size:20px;"    class=" mdi mdi-arrow-up-bold-hexagon-outline"></button>');
                   
                }else{
                    $('#status'+attribute_id).html('<i title="Desable"  style="font-size:20px;" status="checked"  attribute_id="'+attribute_id+'"  class="attribute_action mdi mdi-checkbox-marked"></i><button type="submit" title="Update"  style="border:none;background-color:none; font-size:20px;"    class=" mdi mdi-arrow-up-bold-hexagon-outline"></button>');
                }
                toastr.success("Status changed successfully");
                
                
            },
            error:function(){
                console.log("resp");
            }
        })
        
        
    })
    // get section id for products on submit time
    $("#append").click( function(e) {
        // e.preventDefault();
        $(".inc").append('<div class="controls mb-2">\
        <div style="margin-left:1px;margin-right:1px;" class=" row">\
        <input type="text" class="form-control col-3" name="size[]" placeholder="Size"/>\
        <input type="number" class="form-control col-3" name="stock[]" placeholder="stock"/>\
        <input type="number" class="form-control col-2" name="price[]" placeholder="price"/>\
        <input type="text" class="form-control col-2" name="sku[]" placeholder="sku"/>\
        <a style="" class="col-2 remove_this" type="" id="" name="append">\
        Remove </a> \
    </div>');
        return false;
        });
    // add and remove elemoent for attributes
    jQuery(document).on('click', '.remove_this', function() {
        jQuery(this).parent().remove();
        return false;
        });
        $("input[type=submit]").click(function(e) {
            e.preventDefault();
            $(this).next("[name=textbox]")
            .val($.map($(".inc :text"), function(el) {
                return el.value
            }).join(",\n")
            )
        })

    // 
   
})