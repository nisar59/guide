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
                    <h4 class="col-md-6">Devices Guide: <b>{{$device->name}}</b></h4>
                    <div class="col-md-6 text-right">
                      <a href="{{url('devices-guide/'.$device->id.'/create')}}" class="btn btn-primary"><i class="fas fa-paint-roller"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <iframe srcdoc='<!DOCTYPE html>
                <html lang="en">
                  <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <meta name="description" content="">
                    <meta name="author" content="">
                    <title>My page</title>
                    <!-- Bootstrap core CSS -->
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
                    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
                    <style>
                        html, body
                        {
                            width:100%;
                            height:100%;
                        }
                    </style>
                  </head>
                  <body>{{$device->devicesguide->html}}</body></html>' style="height: 550px; width: 100%; overflow: scroll;"></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
@section('js')
<script type="text/javascript">
    //Roles table
    $(document).ready( function(){

      });
</script>
@endsection
