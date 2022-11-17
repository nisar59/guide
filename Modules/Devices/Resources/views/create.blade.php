@extends('layouts.template')
@section('title')
Devices
@endsection
@section('content')
<section class="section">
  <div class="section-body">
    
    <form action="{{url('devices/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Add Device</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="form-group col-md-10">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image" id="image" onchange="document.getElementById('image-display').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="form-group col-md-2">
                      <img src="{{url('public/img/images.png')}}" class="image-display" id="image-display" width="80" height="80">
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