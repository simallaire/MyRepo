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

<h3>Create a new post</h3>
 

	@if($post->id == 0)
	{{-- Create --}}
		<form action="/post" method="post">
	@else
	{{-- Update --}}
		<form action="/post/{{ $post->id }}" method="post">
		@method('PUT')
	@endif
	@csrf
	<input type="hidden" name="id" value="{{ $post->id }}">
	<fieldset class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" required id="title" value="{{ $post->title }}" >
	</fieldset>
	<fieldset class="form-group">
		<label for="body">Body</label>
		<textarea name="body" rows="10" id="editor" class="jqte" required >{{ $post->body }}</textarea>
	</fieldset>	
	<fieldset class="form-group">

		@include('modules.tagsinput')
	
	</fieldset>
	
	<fieldset class="form-group" id="imgFieldset">
		<label for="picture">Cover picture</label>
		<input type="file" class="" id="fileinput" name="picture">

	</fieldset>

		@if($post->id == 0)
			{{-- Create --}}
			<input class="form-control" type="submit" name="" value="Create">
		@else
			{{-- Update --}}
			<input class="form-control" type="submit" name="" value="Update">
		@endif

	<fieldset class="form-group">

		@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
		@endif
	</fieldset>
</form>
<img id="coverimg" style="display: none; max-width: 900px; max-height: 600px;" />


<script>
	$("#editor").jqte();
$(document).ready(function(){

	$("#fileinput").change(function(){
		var file = $(this).prop('files')[0];
		console.log(file);
		var tmppath = URL.createObjectURL(event.target.files[0]);
		$("#coverimg").fadeIn('fast').attr('src',tmppath);
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

