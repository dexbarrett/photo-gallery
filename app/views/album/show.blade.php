@extends('layouts.master')
@section('title', $album->name)
@section('content')
  <div class="container">

    <div class="starter-template">
      <div class="media">  
        <img class="media-object pull-left" alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" width="350px">
        <div class="media-body">
          <h2 class="media-heading" style="font-size: 26px;">Album Name :</h2>
          <p>{{$album->name}}</p>
          <div class="media">
           <h2 class="media-heading" style="font-size: 26px;">Album Description :</h2>
           <p>{{$album->description}}<p>
            <a href="{{ URL::route('add_image',array('id'=>$album->id)) }}"><button type="button" class="btn btn-primary btn-large">Add New Image to Album</button></a>
            {{ Form::open(array('route' => array('album.destroy', $album->id), 'method' => 'delete')) }}
            <button type="submit" class="btn btn-danger btn-large">Delete Album</button>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($album->photos as $photo) 
        @include('partials.image')
      @endforeach
    </div>
  </div>
@stop