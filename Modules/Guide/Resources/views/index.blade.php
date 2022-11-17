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
                    <h4 class="col-md-6">Device Guide</h4>
                    <h4 class="col-md-6 text-right">{{$device->name}}</h4>
                  </div>
                  <div class="card-body" style="height: 550px; overflow: scroll;">
                    <center> <a href="{{url('devices-guide/'.$device->id.'/create')}}">Add</a></center>
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
