<p></p>
		@php
			$collection = collect($post->tags);
			$plucked = $collection->pluck('name');
			$tags = App\Tag::get();

		@endphp
			<label for="tags">Tags*</label>
			<input type="text" value="" name="tags" id="tag" class="form-control" placeholder="Subject,Frameworks,Other languages, etc." value="" data-role="tagsinput" />
			{{ implode(", #",$plucked->all()) }}
			
			
