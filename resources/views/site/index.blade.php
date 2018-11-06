@extends('layouts.app_front')

@section('header')
  @include('site.header')
@stop

@section('pagetitle', 'Home')


@section('content')

<!-- Banner Sec -->

@if(count($banner_section_block) > 0)
		{!!html_entity_decode($banner_section_block->description)!!}
@endif

@if(count($work_section_block) > 0)
		{!!html_entity_decode($work_section_block->description)!!}
@endif

@if(count($happiness_section_block) > 0)
		{!!html_entity_decode($happiness_section_block->description)!!}
@endif


<!-- End -->

<!-- Testimonial section -->

@include('site.testimonial')

<!-- End -->

<!-- Find the Perfect Sec -->
<section class="find-perfect-sec home-common">
	<div class="img-box">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3>Find the perfect experience:</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6 col-sm-6 col-md-4 ds-space">
					<a href="{{'/find-perfect-experience/Arts & Crafts/Chicago, IL/category'}}" target="_blank">
						<div class="circle-img">
							<img src="{{ asset('front/images/img14.png') }}" alt="" title="" class="rounded">
						</div>
						<h4 class="pt-4 m-0">Arts &amp; Crafts</h4>
					</a>
				</div>
				<div class="col-6 col-sm-6 col-md-4  ds-space">
					<a href="{{'/find-perfect-experience/Cooking classes/Chicago, IL/category'}}" target="_blank">
						<div class="circle-img">
							<img src="{{ asset('front/images/img15.png') }}" alt="" title="" class="rounded">
						</div>
						<h4 class="pt-4 m-0">Cooking</h4>
					</a>	
				</div>
				
				<div class="col-6 col-sm-6 col-md-4 ds-space">
					<a href="{{'/find-perfect-experience/Kids Sports/Chicago, IL/category'}}" target="_blank">
						<div class="circle-img">
							<img src="{{ asset('front/images/img16.png') }}" alt="" title="" class="rounded">
						</div>
						<h4 class="pt-4 m-0">Sports &amp; Active</h4>
					</a>	
				</div>

				<div class="col-6 col-sm-6 col-md-4 ds-space">
					<a href="{{'/find-perfect-experience/Kids Outdoor Activities/Chicago, IL/category'}}" target="_blank">
						<div class="circle-img">
							<img src="{{ asset('front/images/img13.png') }}" alt="" title="" class="rounded">
						</div>
						<h4 class="pt-4 m-0">Nature</h4>
					</a>	
				</div>
				
				<div class="col-6 col-sm-6 col-md-4  ds-space">
					<a href="{{'/find-perfect-experience/science/Chicago, IL/category'}}" target="_blank">
						<div class="circle-img">
							<img src="{{ asset('front/images/img12.png') }}" alt="" title="" class="rounded">
						</div>
						<h4 class="pt-4 m-0">Science</h4>
					</a>	
				</div>
				
				<div class="col-6 col-sm-6 col-md-4 ds-space">
					<a href="{{'/find-perfect-experience/reading/Chicago, IL/category'}}" target="_blank">
						<div class="circle-img">
							<img src="{{ asset('front/images/img17.png') }}" alt="" title="" class="rounded">
						</div>
						<h4 class="pt-4 m-0">Reading</h4>
					</a>	
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-sm-12">
					<a href="javascript:void(0)" class="commont-btn">BROWSE ALL CATEGORIES</a>
				</div>
			</div> -->
		</div>
	</div>
</section>

@endsection