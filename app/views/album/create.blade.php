@extends('layouts.master')
@section('title', 'Create an album')
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
            
            {{ Form::open(array('route' => 'album.store', 'files' => true)) }}
                <fieldset>
                    <legend>Create an Album</legend>
                    <div class="form-group">
                        {{ Form::label('name', 'Album Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Album Name')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Album Description') }}
                        {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Album description')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('cover_image', 'Select a cover image') }}
                        {{Form::file('cover_image')}}
                    </div>
                    {{ Form::submit('Create', array('class' => 'btn btn-default')) }} 
                </fieldset>
            {{ Form::close() }}
        </div>
    </div> <!-- /container -->
@stop