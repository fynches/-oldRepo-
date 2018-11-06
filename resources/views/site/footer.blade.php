<!-- Footer Sec -->
<footer class="cm-ftr">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="javascript:void(0)" class="logo">
					<img src="{{ asset('front/images/Fynches_Logo_Teal.png') }}" alt="" title="">
				</a>
			</div>
		</div>
		<div class="row pt-2 pb-0">
			<div class="col-md-12 col-lg-10">
				<ul class="list-unstyled">
					<li><a href="{{ url('event') }}">Create Event</a></li>
					<li><a href="{{ url('aboutUs') }}">About</a></li> 
					<li><a href="{{env('SITE_URL')}}/blog">Blog</a></li>
					<li><a href="{{ url('faq') }}">FAQ</a></li>
					<li><a href="{{ url('contactUs') }}">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-md-12 col-lg-2">
				<div class="social-sec">
					<a target="__blank" href="https://twitter.com/fynches"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a target="__blank" href="https://www.facebook.com/fynchescom"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a target="__blank" href="https://www.instagram.com/fynches"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<ul class="list-unstyled copyright">
					<li>&copy; 2018 All Right Reserved</li>
					<li><a target="_blank" href="{{ url('terms-condition') }}">Term &amp; Conditions</a></li>
					<li><a target="_blank" href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- End -->
