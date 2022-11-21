<!DOCTYPE html>
<html>
@include('frontend.include.head')
<body style="Background:#f8f9fa">
@include('frontend.include.header')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://deviceguides.vodafone.co.uk/Content/images/design_assets/top_banner_uk_full.jpg" alt="First slide">
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center p-3">
			<h2>Welcome to device help</h2>
		</div>
	</div>	
	<div class="row">
		@for($i=1; $i<=10; $i++)
		<a href="" class="col-md-3 col-sm-6 mb-3 bg-light" style="height:200px;">
			<div class="w-100" style="height: 100%; width: 100%; Background:url('https://images.unsplash.com/photo-1603491656337-3b491147917c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bGFob3JlJTIwY2l0eXxlbnwwfHwwfHw%3D&w=1000&q=80'); background-repeat: no-repeat; background-size: cover;"></div>
		</a>
		@endfor
	</div>
</div>
@yield('content')

@include('frontend.include.footer')
</body>
</html>