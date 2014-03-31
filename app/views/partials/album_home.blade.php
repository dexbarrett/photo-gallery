<div class="col-lg-3">
  <div class="thumbnail" style="min-height: 514px;">
    <img alt="{{$album->name}}" src="albums/{{$album->cover_image}}">
    <div class="caption">
      <h3>{{$album->name}}</h3>
      <p>{{$album->description}}</p>
      <p>{{count($album->photos)}} image(s).</p>
      <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{ date("g:ha",strtotime($album->created_at)) }}</p>
      <p>{{ HTML::linkRoute('album.show', 'Show Gallery', $album->id, array('class' => 'btn btn-big btn-default')) }}</p>
    </div>
  </div>
</div>