<br/>
		@php
			$collection = collect($post->tags);
			$plucked = $collection->pluck('name');
			$tags = App\Tag::get();

		@endphp
			<label class="subtitle is-5" for="tags">Tags	</label>
			<input type="text" value="" name="tags" id="tag" class="input is-rounded" placeholder="Subject,Frameworks,Other languages, etc." value="" data-role="tagsinput" />
			{{ implode(", #",$plucked->all()) }}
			
			
