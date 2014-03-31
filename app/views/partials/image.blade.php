<div class="col-lg-3">
  <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
    <img alt="{{$album->name}}" src="/albums/{{$photo->image}}">
    <div class="caption">
      <p>{{$photo->description}}</p>
      <p><p>Created date:  {{ date("d F Y",strtotime($photo->created_at)) }} at {{ date("g:ha",strtotime($photo->created_at)) }}</p></p>
      {{ Form::open(array('method' => 'delete', 'route' => array('delete_image', $photo->id))) }}
      {{ Form::submit('delete image', array('class' => 'btn btn-danger btn-small')) }}
      {{ Form::close() }}
      @if(count($albums))
      <p>Move image to another Album :</p>
      {{ Form::open(array('route' => array('move_image', $photo->id))) }}
      <select name="new_album">
        @foreach($albums as $others)
        <option value="{{ $others->id }}">{{ $others->name }}</option>
        @endforeach
      </select>
      <input type="hidden" name="photo" value="{{$photo->id}}" />
      <button type="submit" class="btn btn-small btn-info" onclick="return confirm('Are you sure?')">Move Image</button>
      {{ Form::close() }}
      @endif
    </div>
  </div>
</div>