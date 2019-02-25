@extends('layouts.app')

@section('content')





<div class="container">

<div class="row">

	<div class="col-sm-8 blog-main">

		<div class="blog-post">
			<h2 class="blog-post-title">{{ $project->title }}</h2>
	
			<p class="blog-post-meta">
				{{ $project->created_at->diffForHumans() }} 
				by <a href="user/{{ $project->user->id }}">
					{{ $project->user->name }}</a></p>

			<p>{{ $project->description }}</p>
			<hr>
			<p>Main Language: {{ $project->language->name }}</p>
			<p>
			Tags: 
			<code>
				@include('modules.tags',compact('project'))
			</code>
			</p>
			</div>
		</div>
	</div>
</div>
				
@endsection