<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link href="{{ asset('theme') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="{{ asset('theme') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('theme') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('course.index')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>{{ __('language.Courses') }}</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('test.index')}}">
                <i class="fas fa-award"></i>
                <span>{{ __('language.Tests') }}</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('student.index')}}">
                <i class="fas fa-graduation-cap"></i>
                <span>{{ __('language.Students') }}</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Right-aligned menu
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button"><a href="locale/en">English</a></button>
                        <button class="dropdown-item" type="button"><a href="locale/vi">Vietnam</a></button>
                    </div>
                </div>
{{--                <div class="btn-group">--}}
{{--                    <select class="form-control" name="Sex">--}}
{{--                        <option ><a href="locale/en"><img src="{{'https://image.flaticon.com/icons/svg/197/197473.svg'}}" width="224" height="224" alt="Vietnam free icon" title="Vietnam free icon"></a></option>--}}
{{--                        <option ><a href="locale/vi">Vietnam</a></option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="language">--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="locale/vi" data-id="" data-title=""><img src="{{ asset('') }}theme/img/icon-VN.png" ></a>--}}
{{--                            <a id='locale' href=""></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </nav>
            @yield('content')
        </div>
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="{{ asset('theme') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('theme') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('theme') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{ asset('theme') }}/js/sb-admin-2.min.js"></script>
<script src="{{ asset('theme') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('theme') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('theme') }}/js/demo/datatables-demo.js"></script>
</body>
</html>
