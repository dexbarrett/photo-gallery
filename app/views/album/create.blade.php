<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Album</title>
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css') }}
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
                    <li class="active">{{ HTML::linkRoute('album.create', 'Create New Album') }}</li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
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
     {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
     {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js') }}
</body>
</html>