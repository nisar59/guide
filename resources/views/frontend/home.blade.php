@extends('frontend.include.template')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    	<h1 style="position:absolute; z-index: 11; top: 50%;left: 50%;transform: translate(-50%, -50%); color: white; text-align: center;">{{Settings()->banner_text}}</h1>
      <img class="d-block w-100" src="{{url('public/img/settings/'.Settings()->banner)}}" alt="First slide">
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center p-3">
			<h2>Choose a Guide</h2>
		</div>
	</div>	
	<div class="row devices">
		@foreach(AllDevices() as $device)
		<a href="{{url('guide/'.$device->slug)}}" class="col-md-3 col-sm-6 mb-3">
			<div class="device-text"><span>{{$device->name}}</span></div>
			<div class="w-100 device-bg" style="Background:url('{{url("public/img/devices/".$device->image)}}');background-repeat: no-repeat;background-size: cover;"></div>
		</a>
		@endforeach
	</div>
</div>
@endsection