@extends('layouts.template')
@section('title')
Dashboard
@endsection

@section('css')
<style type="text/css">
@keyframes placeHolderShimmer{
    0%{
        background-position: -468px 0
    }
    100%{
        background-position: 468px 0
    }
}
.linear-background {
    animation-duration: 1s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: #f6f7f8;
    background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    background-size: 1000px 104px;
    height: 338px;
    position: relative;
    overflow: hidden;
}
</style>
@endsection

@section('content')
        <section class="section">
          <div class="row">
            <div class="col-md-12">

            </div>
          </div>
        </section>

@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {
});
</script>


@endsection