@extends('layouts.master')
@section('title', 'Add new image to album')
@section('content')
    <div class="container" style="text-align: center;">
        <div class="span4" style="display: inline-block; margin-top:100px;">
            @if($errors->has())
            <div class="alert alert-block alert-error fade in" id="error-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Warning!</h4>
                <ul>
                    @foreach($errors->all('<li>:message</li>') as $message)
                        {{ $message }}
                    @endforeach
                </ul>
            </div>
            @endif
            {{ Form::open(array('route' => array('add_image', $album->id), 'files' => true)) }}
            {{ Form::hidden('album_id', $album->id) }}
            <fieldset>
                <legend>Add an Image to {{$album->name}}</legend>
                <div class="form-group">
                  {{ Form::label('description', 'Image Description') }}
                  {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Image description')) }}
                </div>
                <div class="form-group">
                  {{ Form::label('image', 'Select an image') }}
                  {{ Form::file('image') }}
                </div>
                {{ Form::submit('Add image', array('class' => 'btn btn-default')) }}
              </fieldset>
            {{ Form::close() }}
        </div>
    </div> <!-- /container -->
@stop