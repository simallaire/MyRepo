<div class="input-group" id="{{$id}}">

        <div class="custom-file">
          @if(isset($post->files[0]))
          <input type="file" class="custom-file-input file-input fileinput" value="{{$post->files[0]->url}}" name="image" id="{{$id}}" aria-describedby="inputGroupFileAddon01">
          @else
          <input type="file" class="custom-file-input file-input fileinput" name="image" id="{{$id}}" aria-describedby="inputGroupFileAddon01">

          @endif
          <label class="custom-file-label" for="image">Choose file</label>
        </div>
      </div>


