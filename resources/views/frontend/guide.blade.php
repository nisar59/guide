@extends('frontend.include.template')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    	<h1 style="position:absolute; z-index: 11; top: 50%;left: 50%;transform: translate(-50%, -50%); color: white; text-align: center;">{{$guide->name}}</h1>
      <img class="d-block w-100" src="{{url('public/img/settings/'.Settings()->banner)}}" alt="First slide">
    </div>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center p-3">
			<h2>{{$guide->name}}</h2>
		</div>
	</div>
	@if($guide->devicesguide!=null)
	{!!$guide->devicesguide->html!!}
	@else
	<p class="text-center">Guide not Found</p>
	@endif
</div>
@endsection