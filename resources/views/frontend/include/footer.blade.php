  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-12 align-items-center text-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">© Copyright {{date('Y')}} all rights reserved</span>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" ></script>
  <script type="text/javascript">
  var availableTags=[];
  </script>
    @foreach(AllDevices() as $key=> $device)
    <script type="text/javascript">
      availableTags["{{$key}}"]={
        'label':"{{$device->name}}",
        'slug':"{{$device->slug}}",
      };
    </script>
    @endforeach

<script type="text/javascript">
$(document).ready(function() {
   console.log(availableTags);
    $( "#search" ).autocomplete({
      source: availableTags,
      minLength:1,
      select: function(event, ui)
      {
        window.location='{{url("guide/")}}/'+ui.item.slug;
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      console.log(item);
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };

  });

</script>