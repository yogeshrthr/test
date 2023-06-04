<div class="form-group">
<label for="categoryLevel">Select Category Level  </label>
<select @if(isset($category->parent_id) && $category->parent_id==0 ) selected="" @endif   class="form-control" name="categoryLevel" >
    <option  value="0" >Main Category</option>
    @if(!empty($getCategory))
        @foreach($getCategory  as $mincategory)
        <option @if(isset($category->id)) @if( $category->id ==$mincategory['id'])  selected="" @endif @endif value="{{$mincategory['id']}}">{{$mincategory['category_name']}}</option>
            @if(!empty($mincategory['sub_category']))
                @foreach($mincategory['sub_category'] as $subcat)
                    <option   @if(isset($category->id)) @if($category->id ==$subcat['id'])  selected="" @endif @endif  value="{{$subcat['id']}}">&nbsp;&raquo;&nbsp;{{$subcat['category_name']}}</option>
                @endforeach
            @endif
                
        @endforeach
    
    @endif
    
    
</select>





</div>