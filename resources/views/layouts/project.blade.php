@extends('layouts.app')

@section('content')
	<div id="title" class="card">
		<div class="card-body">
			<h3>
				@yield('title')
			</h3>
		</div>

	</div>
	<div id="title" class="card" style="min-height: 300px;">
		<div class="card-body">
			@yield('description')

		</div>

	</div>


@endsection