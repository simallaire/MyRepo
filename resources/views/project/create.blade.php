@extends("layouts.app")


@section("content")

<h3>Create a new project</h3>

	@if($project->id == 0)
	{{-- Create --}}
		<form action="/project" method="post">
	@else
	{{-- Update --}}
		<form action="/project/{{ $project->id }}" method="post">
		@method('PUT')
	@endif
	@csrf
	<input type="hidden" name="id" value="{{ $project->id }}">
	<fieldset class="form-group">
		<label for="title">Project Name*</label>
		<input type="text" class="form-control" name="title" id="title" value="{{ $project->title }}" >
	</fieldset>
	<fieldset class="form-group">
		<label for="description">Description*</label>
		<input type="text" name="description" class="form-control" id="description" value="{{ $project->description }}" >
	</fieldset>	
	<fieldset class="form-group">
		<label for="language">Main programming language*</label>
		<input type="text" value="{{ $project->language }}" name="language" class="form-control" id="language" >
	<fieldset class="form-group">
<p></p>
	@php
		$collection = collect($project->tags);
		$plucked = $collection->pluck('name');

	@endphp
			<label for="tags">Tags*</label>
			<input type="text" value="" name="tags" class="form-control" placeholder="Subject,Frameworks,Other languages, etc." value="" data-role="tagsinput" />
			{{ implode(", #",$plucked->all()) }}
			
			
	</fieldset>
	</fieldset>

		@if($project->id == 0)
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

<script>

// Prevent submit form with ENTER
$(document).ready(function() {
	var languages = [
		@foreach($languages as $language)
		"{{$language->name}}",
		@endforeach

	];
	var options={

	};
		
});
</script>

@endsection

