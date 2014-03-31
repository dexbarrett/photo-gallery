<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css') }}
    {{ HTML::style('css/styles.css') }}
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
                    <li>{{ HTML::linkRoute('album.create', 'Create New Album') }}</li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    @yield('content')
    {{ HTML::script('//code.jquery.com/jquery-1.11.0.min.js') }}
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js') }}
</body>
</html>