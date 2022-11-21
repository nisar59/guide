@extends('layouts.template')
@section('title')
Media
@endsection
@section('content')
<section class="section">
  <div class="section-body">
    
    <form action="{{url('media/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Add Media</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">  
                      <label>Media</label>
                      <input type="file" class="form-control" name="file" id="media_file">
                      </div>
                      <div class="col-md-6">

                      <img src="{{url('public/img/images.png')}}" class="image-display" id="image-display" width="200" height="150">
                      <iframe hidden src="" frameborder="0" width="200" height="150" id="display-video"></iframe>
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
  <script type="text/javascript">
    $(document).ready(function () {
      $("#media_file").on('change', function() {
        var src_url = window.URL.createObjectURL(this.files[0]);

        var validExtensions = ["jpg","pdf","jpeg","gif","png"];
        var file = $(this).val().split('.').pop();
        if (validExtensions.indexOf(file) == -1) {
           $("#image-display").attr('hidden',true);
            $("#display-video").removeAttr('hidden');
            $("#display-video").attr('src',src_url);

        }
        else{
           $("#display-video").attr('hidden',true);
            $("#image-display").removeAttr('hidden');          
            $("#image-display").attr('src',src_url);
        }



        console.log(src_url);
      });
    });
  </script>

  @endsection