  
<!-- jquery-->
<script src="{{asset('editor/js/jquery.min.js')}}"></script>
<script src="{{asset('editor/js/jquery.hotkeys.js')}}"></script>

<!-- bootstrap-->
<script src="{{asset('editor/js/popper.min.js')}}"></script>
<script src="{{asset('editor/js/bootstrap.min.js')}}"></script>

<!-- builder code-->
<script src="{{asset('editor/libs/builder/builder.js')}}"></script> 
<!-- undo manager-->
<script src="{{asset('editor/libs/builder/undo.js')}}"></script> 
<!-- inputs-->
<script src="{{asset('editor/libs/builder/inputs.js')}}"></script>  


<!-- media gallery -->
<link href="{{asset('editor/libs/media/media.css')}}" rel="stylesheet">
<script>
var token="{{csrf_token()}}";
window.mediaPath = '{{asset("media")}}';
var upload_url="{{url('media/store')}}";
var scan_url="{{url('media/scan')}}";
//Vvveb.themeBaseUrl = 'demo/landing/';
</script>
<script src="{{asset('editor/libs/media/media.js')}}"></script>  
<script src="{{asset('editor/libs/media/openverse.js')}}"></script>
<script src="{{asset('editor/libs/builder/plugin-media.js')}}"></script>  

<!-- bootstrap colorpicker //uncomment bellow scripts to enable -->
<!--
<script src="libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<link href="libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<script src="libs/builder/plugin-bootstrap-colorpicker.js')}}"></script>
-->

<!-- components-->
<!-- script src="libs/builder/components-server.js')}}"></script -->  
<script src="{{asset('editor/libs/builder/plugin-google-fonts.js')}}"></script> 
<script src="{{asset('editor/libs/builder/components-common.js')}}"></script>   
<script src="{{asset('editor/libs/builder/plugin-aos.js')}}"></script>
<script src="{{asset('editor/libs/builder/components-elements.js')}}"></script> 
<script src="{{asset('editor/libs/builder/components-bootstrap5.js')}}"></script>  
<script src="{{asset('editor/libs/builder/components-widgets.js')}}"></script>  
<script src="{{asset('editor/libs/builder/components-html.js')}}"></script>  

<!-- sections-->
<!-- <script src="demo/landing/sections/sections.js')}}"></script> -->
<script src="{{asset('editor/libs/builder/sections-bootstrap4.js')}}"></script>

<!-- blocks-->
<script src="{{asset('editor/libs/builder/blocks-bootstrap4.js')}}"></script>

<!-- plugins -->

<!-- code mirror - code editor syntax highlight -->
<link href="{{asset('editor/libs/codemirror/lib/codemirror.css')}}" rel="stylesheet"/>
<link href="{{asset('editor/libs/codemirror/theme/material.css')}}" rel="stylesheet"/>
<script src="{{asset('editor/libs/codemirror/lib/codemirror.js')}}"></script>
<script src="{{asset('editor/libs/codemirror/lib/xml.js')}}"></script>
<script src="{{asset('editor/libs/codemirror/lib/formatting.js')}}"></script>
<script src="{{asset('editor/libs/builder/plugin-codemirror.js')}}"></script>   


<!-- 
Tinymce plugin
Clone or copy https://github.com/tinymce/tinymce-dist to libs/tinymce-dist 
-->
<!-- 
<script src="libs/tinymce-dist/tinymce.min.js')}}"></script>
<script src="libs/builder/plugin-tinymce.js')}}"></script>   
-->

<!-- 
CKEditor plugin
Unzip the latest ckeditor release zip from https://github.com/ckeditor/ckeditor4/releases to libs/ckeditor 
-->
<!--
<script src="libs/ckeditor/ckeditor.js')}}"></script>
<script src="libs/builder/plugin-ckeditor.js')}}"></script>  
-->

<!-- jszip - download page as zip -->
<script src="{{asset('editor/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('editor/libs/jszip/filesaver.min.js')}}"></script>
<script src="{{asset('editor/libs/builder/plugin-jszip.js')}}"></script>


<!-- autocomplete plugin used by autocomplete input-->
<script src="{{asset('editor/libs/autocomplete/jquery.autocomplete.js')}}"></script>  
