@extends('layouts.template')
@section('title')
Devices
@endsection
@section('content')
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="col-md-6">Devices</h4>
                    <div class="col-md-6 text-right">
                    <a href="{{url('devices/create')}}" class="btn btn-success">+</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="users" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Guide</th>
                          </tr>
                        </thead>
                        <tbody> 
                        </tbody>
                      </table>
                    </div>
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
  var roles_table = $('#users').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{url('devices')}}",
              buttons:[],
              columns: [
                {data: 'image', name: 'image', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'guide', name: 'guide', orderable: false, searchable: false},
            ]
          });
      });
</script>
@endsection
