@extends('layouts.app')

@section('content')
<div class="box">
	<h3>Create Post</h3>
	<form action="/posts" method="post" role="form" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="row uniform 50%">
			<div class="12u">
				<input id="title" name="title" placeholder="I want to talk about..."
				required="" type="text">
			</div>
		</div>

		<div class="row uniform 50%">
			<div class="12u">
				<textarea id="content" name="content" required="" rows="12"></textarea>
			</div>
		</div>



		<div class="row uniform 50%">
			<div class="12u">
				<div id="dZUpload" class="dropzone">
		      		<div class="dz-default dz-message"></div>
				</div>
			</div>
		</div>

		<div class="row uniform">
			<div class="12u">
				<input class="special fit" type="submit" value="Create">
			</div>
		</div>
	</form>
</div>
@stop

@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" property="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script>
$(document).ready(function () {
    Dropzone.autoDiscover = false;
    $("#dZUpload").dropzone({
    	paramName: "image",
        url: "/posts",
        addRemoveLinks: false,
        autoProcessQueue: false,
        clickable: false,
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            console.log("Successfully uploaded :" + imgName);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });
});
</script>
@stop