@extends('layouts.template')
@section('title')
Device Guide
@endsection
@section('content')
<section class="section">
   <div class="section-body">
      <div class="row">
         <div class="col-12">
            <div class="card card-primary">
               <div class="card-header">
                  <h4 class="col-md-6">Devices Guide: <b>{{$guide->name}}</b></h4>
                  <div class="col-md-6">
                  <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary pull-right">media</a>
                  </div>
               </div>
               <div class="card-body">
                  <form class="row" method="POST" action="{{url('devices-guide/store/'.$guide->id)}}" enctype="multipart/form-data">
                     @csrf
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="guide">Add a Device Guide</label>
                           <textarea name="html" class="form-control" placeholder="Add a Device Guide" id="guide" cols="30" rows="10">
                              @if($guide->devicesguide!=null)
                              {!! $guide->devicesguide->html !!}
                              @endif
                           </textarea>
                        </div>
                     </div>
                     <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@include('guide::media-modal',$media)

@endsection
@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.8/tinymce.min.js"></script>
<script type="text/javascript">
//Roles table
$(document).ready( function(){

    tinymce.init({
      selector: '#guide',
      height: 500,
      theme: 'silver',
      plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
      ],
      toolbar1: 'undo redo | insert | styleselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
      fontsize_formats: "8pt 10pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 36pt 38pt",
      image_advtab: true,
      templates: [{
          title: 'Test template 1',
          content: 'Test 1'
        },
        {
          title: 'Test template 2',
          content: 'Test 2'
        }
      ],
      content_css: []
    });
});
</script>
@endsection