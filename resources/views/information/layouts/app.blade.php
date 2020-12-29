<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <section class="">
        <nav class="navbar navbar-dark bg-primary justify-content-center">
            <a href="" style="color: #fff;font-size: 26px;font-weight:bold;" >Laravel Vue CRUD Operation</a>
        </nav>
    </section>
    <div class="container mt-3" id="app">
        <vue-progress-bar></vue-progress-bar>
        <div class="row justify-content-center">
            @section('main-content')
            @show
        </div>
    </div>
    <section class="mt-2">
        <nav class="navbar navbar-dark bg-primary justify-content-center">
            <h2 style="color: white;padding-top: 20px;">Md Ashikul Islam</h2>
        </nav>
    </section>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
