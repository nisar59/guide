@extends('layouts.template')
@section('title')
Devices
@endsection
@section('content')
<section class="section">
  <div class="section-body">
    
    <form action="{{url('devices/update/'.$data['device']->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Edit Device</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control" value="{{$data['device']->name}}" name="name" placeholder="Name">
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="form-group col-md-10">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image" id="image" onchange="document.getElementById('image-display').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    @php
                    $image_name=$data['device']->image;
                    $image_path=public_path('img/devices/'.$image_name);
                    if(file_exists($image_path) AND $image_name!=''){
                    $image_path=url('public/img/devices/'.$image_name);
                    }
                    else{
                    $image_path=url('public/img/images.png');
                    }
                    @endphp
                    <div class="form-group col-md-2">
                      <img src="{{$image_path}}" class="image-display" id="image-display" width="80" height="80">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
@section('js')
@endsection