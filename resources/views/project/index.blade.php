@extends("layouts.app")

@section('content')

	@if(isset($info))
		<div class="alert alert-info" role="alert">
			{{ $info }}
	    	<button type="button" class="close" data-dismiss="alert">x</button>
		</div>

		<a href="/project" title=""><button type="button" class="form-control myBtn">Show all projects</button></a>
	@endif	
	<ul class="list-group">


	@foreach($projects as $project)
		
			<li class="list-group-item"><a href="/project/{{ $project->id }}" style="font-size: 20px; font-stretch:ultra-condensed;font-weight:bold; ">{{ $project->title }}</a>
			@if($project->user)
				<p style="font-style: italic;">by {{ $project->user->name }}</p>
			@endif
			<code>
				@include('modules.tags',compact('project'))
			</code>
			</li>
@endforeach

	</ul>

@endsection