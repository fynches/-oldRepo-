@extends('layouts.admin')
@section('content')

<div class="portlet light">
     {!! Form::model($tag,array('route' => array('tag.update', $tag->id),'class'=>'form-horizontal','method'=>'PUT','id'=>'tag','files'=>true)) !!}
    
    <div class="form-group">
        <div class=" col-md-6">
            {!! Form::label('tag_name', 'Tag'); !!}
            {!! Form::text('tag_name',$tag->tag_name,array('class'=>'form-control')) !!}
        </div>
    </div>
    
   
    
    <div class="form-group">
        <div class="col-md-6">
            {!! Form::label('image', 'Image'); !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-4">
            <div class="image-upload">                
                <?php
                    $defaultPath = config('constant.imageNotFound');
                    
					$tag_image = $tag['image'];
		            
                    if ($tag_image && $tag_image != "") {
                        
                       $imgPath = 'storage/tagImages/' . $tag_image;
                       
                        if (file_exists($imgPath))
                        {
                            $imgPath = $imgPath;
                        } else {
                            $imgPath = $defaultPath;
                        }
                    } else {
                        $imgPath = $defaultPath;
                    }
                    ?>
                <div class="fileinput fileinput-exists image_sec" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail"  style="width: 200px; height: 150px;">
                        <a rel="gallery" class="fancybox" href="{{ asset($imgPath) }}" target='_blank'>
                            <img src="{{ asset($imgPath) }}"  alt="" />
                        </a>
                    </div>
                    <div id="tag_img">
                        <span class="btn red btn-outline btn-file">
                            <span class="fileinput-new"> Select image </span>
                            <span class="fileinput-exists"> Change </span>
                            <input type="file" name="image" value="<?php echo $tag_image; ?>" id="image" onchange='readURL(this);'>
                            <input type="hidden" name="old_images" value="<?php echo $tag_image; ?>" id="old_images">
                        </span>
                    </div>
                </div>                    
            </div>
        </div>
     </div>  
    
    <div class="form-group">
		<div class="col-md-6">
                {!! Form::label('status', 'Status'); !!}
                {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'), null, array('class' => 'form-control')) !!}
        </div>                  
    </div>  
     
    <div class="form-group">
        <div class="col-md-12">
            {!! Form::submit('Save',array('class'=>'btn btn-primary')); !!}
            <a class="btn btn-default" href="{{ url('/admin/tag')}}">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>  

{{Html::script("/assets/common/tag/tag_index.js")}}
@endsection