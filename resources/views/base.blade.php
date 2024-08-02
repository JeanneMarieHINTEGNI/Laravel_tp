<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.min.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg nav-bar-dark bg-primary mb-4">
    <div class="container-fluid">
        <!--<a class="navbar-brand" href="/">TodoApp</a>-->
        <a class="navbar-brand" href="{{route('task.index')}}">TodoApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{route('task.index')}}" aria-current="page" class="nav-link">Tasks</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        
        
    </div>
</nav>
<div class="container">  
    @if(session('success'))

    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @yield('content')
</div>



    
</body>

<script src="{{ asset('js/bootstrap.js')}}"></script>
</html>