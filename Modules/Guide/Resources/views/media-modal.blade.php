<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <hr class="w-100">
      <div class="modal-body">
        <div class="row">
          @foreach($media as $md)
          <div class="col-md-3 p-0 text-center mb-3" style="position: relative;">
            <a href="javascript:void(0)" class="btn text-danger btn-sm copy" data-copy="{{$md->url}}" style="position:absolute; right: 14px;"><i class="far fa-copy"></i></a>
            @if($md->type=='video')
            <iframe src="{{$md->url}}" frameborder="0" width="90%" height="150" id="display-video"></iframe>
            @else
            <img src="{{$md->url}}" class="image-display border" id="image-display" width="90%" height="150">
            @endif
          </div>
          @endforeach
        </div>
      </div>
      <hr class="w-100">
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>