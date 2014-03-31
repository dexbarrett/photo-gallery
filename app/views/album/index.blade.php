<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Awesome Albums</title>
  <!-- Latest compiled and minified CSS -->
  {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css') }}
  <style>
  body {
    padding-top: 50px;
  }
  .starter-template {
    padding: 40px 15px;
    text-align: center;
  }
  </style>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Awesome Albums</a>
      <div class="nav-collapse collapse">
        <ul class="nav navbar-nav">
          <li>{{ HTML::linkRoute('album.create', 'Create new album') }}</li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>

  <div class="container">

    <div class="starter-template">

      <div class="row">
        @foreach($albums as $album)
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
        @endforeach
      </div>

    </div><!-- /.container -->
  </div>
  {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
  {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js') }}
</body>
</html>