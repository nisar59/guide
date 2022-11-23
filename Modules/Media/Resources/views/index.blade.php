@extends('layouts.template')
@section('title')
Media
@endsection
@section('content')
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="col-md-6">Media</h4>
                    <div class="col-md-6 text-right">
                    <a href="{{url('media/create')}}" class="btn btn-success">+</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="users" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>name</th>
                            <th>URL</th>
                            <th>Action</th>
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
              ajax: "{{url('all-media')}}",
              buttons:[],
              columns: [
                {data: 'title', name: 'title'},
                {data: 'name', name: 'name'},
                {data: 'url', name: 'url', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
          });
     $("[data-toggle='tooltip']").tooltip();
      });
</script>
@endsection
