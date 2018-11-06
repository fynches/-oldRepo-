<section class="two-box-sec">
	<div class="container">
		<div class="row">
			@if(count($testimonails) > 0)
				@foreach($testimonails as $key=>$val)
			<?php
				
		        $defaultPath = 'storage/no-img.jpg';
		        $TestimonaialImage = $val->image;
		
		        if ($TestimonaialImage && $TestimonaialImage != "") {
		            
		            $imgPath = 'storage/testimonialImages/' . $TestimonaialImage;
		           
		            if (file_exists($imgPath))
		            {
		                $imgPath = $imgPath;
		            } else {
		                $imgPath = $defaultPath;
		            }
		        } else {
		            $imgPath = $defaultPath;
		        }?>
				<div class="col-sm-12 col-md-5">
				<div class="color-box">
					<img class="color-box" src="{{ asset($imgPath) }}" alt="" title="">
				</div>
				<blockquote class="blockquote text-center">
					<h3>"{{ $val->name }}"</h3>
				    {!!html_entity_decode($val->description)!!}
				    <footer class="blockquote-footer">{{ $val->author_name }}.</footer>
				 </blockquote>
			</div>
				@endforeach
			@endif
		</div>
	</div>
</section>
