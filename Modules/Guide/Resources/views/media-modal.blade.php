<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="la la-video la-lg"></i> Media</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row"> 
        @foreach($media as $md)

        <div class="col-md-3 p-0 text-center mb-3" style="position: relative;">
          <a href="javascript:void(0)" class="btn text-primary btn-sm copy" data-copy="{{$md->url}}" style="position:absolute; right: 14px;"><i class="la la-clipboard la-lg" ></i></a>
          @if($md->type=='video')
          <iframe src="{{$md->url}}" frameborder="0" width="90%" height="150" id="display-video"></iframe>
          @else
          <img src="{{$md->url}}" class="image-display border" id="image-display" width="90%" height="150">
          @endif
        </div>

        @endforeach
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>