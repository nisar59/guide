@extends('layouts.template')
@section('title')
Devices
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('assets/grapes-js/grapes.min.css')}}">
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
              <h4>Device Guide</h4>
            </div>
            <div class="card-body">
            </div>
            </div>
          </div>
        </div>
      </form>


      <div id="gjs">


      </div>


    </div>
  </section>
  @endsection
  @section('js')
  <script src="{{asset('assets/grapes-js/grapes.min.js')}}"></script>
  <script src="{{asset('assets/grapes-js/grapesjs-preset-webpage.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
const editor = grapesjs.init({
  container: '#gjs', 
  plugins: ['grapesjs-preset-webpage'],
  pluginsOpts: {
        'grapesjs-preset-webpage': {
          
        }
      },
  deviceManager:{},
  
});
});

  </script>


  @endsection