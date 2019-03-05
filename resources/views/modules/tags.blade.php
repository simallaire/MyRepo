@if(isset($project->tags))
    @foreach($project->tags as $tag)
    <a href="/tag/{{ $tag->id }}" title="">#{{ $tag->name }}</a>&nbsp; 	
    @endforeach
@endif