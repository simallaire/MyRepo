@extends("layouts.app")


@section("content")
   <script src="/js/jquery-te-1.4.0.min.js"></script>
    <link href="/css/jquery-te-1.4.0.css" rel="stylesheet">
<style type="text/css" media="screen">
	.jqte {
	display:block;
	margin:0 0 10px;
	padding:6px;
	width:95%;
	height:300px;
	background:#FFF;
	border:#AAA 1px solid;
	font-size:13px;
}
textarea.jqte, div.jqte, span.jqte {
	min-height:100px;
}

</style>

<h3 class="title is-4">Create a new post</h3>
 

	@if($post->id == 0)
	{{-- Create --}}
		<form action="/post" method="post" enctype="multipart/form-data">
	@else
	{{-- Update --}}
		<form action="/post/{{ $post->id }}" method="post" enctype="multipart/form-data">
		@method('PUT')
	@endif
	@csrf
	<input type="hidden" name="id" value="{{ $post->id }}">
	<fieldset class="form-group">
		<label class="subtitle is-5" for="title">Title</label>
		<input type="text" class="input is-medium" name="title" required id="title" value="{{ $post->title }}" >
	</fieldset>
	<fieldset class="form-group">
		<label class="subtitle is-5" for="body">Body</label>
		<textarea name="body" rows="10" id="editor" class="jqte" required >{{ $post->body }}</textarea>
	</fieldset>	
	<fieldset class="form-group">

		@include('modules.tagsinput')
	
	</fieldset>
	
	<fieldset class="form-group" id="imgFieldset">
		<?php $id= 1; ?>
		@include('modules.fileinput',compact(['post','id']))
	</fieldset>


		@if($post->id == 0)
			{{-- Create --}}
			<input class="form-control" type="submit" name="" value="Create">
		@else
			{{-- Update --}}
			<input class="form-control" type="submit" name="" value="Update">
		@endif

	<fieldset class="form-group">
		@include('modules.errors')
	</fieldset>
</form>
<img id="coverimg" style="display: none; max-width: 900px; max-height: 600px;" />


<script>
	$("#editor").jqte();
	$(document).ready(function(){
		@if(isset($post->files[0]))
		$("#coverimg").fadeIn('fast').attr('src','/storage/files/{{ $post->files[0]->url}}');
		@endif
		$(".fileinput").change(function(){
			var file = $(this).prop('files')[0];
			var id = $(this).attr("id");
			console.log(file);
			var tmppath = URL.createObjectURL(event.target.files[0]);
			$("#coverimg").fadeIn('fast').attr('src',tmppath);
			$("label[for='image']").html(file.name);
			// $("#imgFieldset").append("<div class='input-group' id='"+id+"'><div class='custom-file'><input type='file' class='custom-file-input fileinput' name='image' id='"+id+"' aria-describedby='inputGroupFileAddon01'><label class="subtitle is-5" class='custom-file-label' for='image'>Choose file</label></div></div>");
		
			
		});
	});

	var tags = [
		@foreach($tags as $tag)
		"{{$tag->name}}",
		@endforeach
	];


	$("#tag").autocomplete({
		source: tags
	});
</script>

@endsection

