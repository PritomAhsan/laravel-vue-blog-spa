<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog Home - Start Bootstrap Template</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('/')}}public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('/')}}public/css/blog-home.css" rel="stylesheet">

</head>

<body>
<div id="app">
    <public-nav></public-nav>

    <!-- Page Content -->
    <public-master></public-master>
    <!-- /.container -->

    <!-- Footer -->
    <public-footer></public-footer>
</div>
<!-- Navigation -->


<!-- Bootstrap core JavaScript -->

<script src="{{asset('/')}}public/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('js/app.js')}}" defer></script>
<script src="{{asset('/')}}public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
