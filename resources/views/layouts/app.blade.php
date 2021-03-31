<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} </title>
    <script src="{{ asset('admin/js/site.js') }}"></script>
    <link rel="icon" type="image/ico" href="{{ asset('admin/img/favicon.ico') }}" sizes="any"/>
    <link rel="stylesheet" href="{{ asset('admin/css/site.css') }}">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    @yield('css')
    @yield('vue')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

<main class="main">
    <div class="container-fluid">
    @yield('content')
    </div>
</main>

</body>
</html>
