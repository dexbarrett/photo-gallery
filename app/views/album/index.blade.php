@extends('layouts.master')
@section('title', 'Awesome Albums')
@section('content')
  <div class="container">
    <div class="starter-template">
      <div class="row">
        @foreach($albums as $album)
          @include('partials.album_home')
        @endforeach
      </div>
    </div><!-- /.container -->
  </div>
@stop