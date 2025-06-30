<x-laravel-ui-adminlte::adminlte-layout>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <!-- Notification Bell -->
<li class="nav-item dropdown ml-4">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-bell"></i>
        @php $count = auth()->user()->unreadNotifications->count(); @endphp
        @if($count > 0)
            <span class="badge badge-warning navbar-badge">{{ $count }}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <span class="dropdown-header">{{ $count }} Notifications</span>
        <div class="dropdown-divider"></div>
        
        @foreach(auth()->user()->unreadNotifications->take(5) as $notification)
            <a href="#" class="dropdown-item">
                <i class="fas fa-info-circle mr-2"></i> {{ $notification->data['message'] ?? 'New Notification' }}
                <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
            </a>
        @endforeach

        <div class="dropdown-divider"></div>
        <a href="{{ route('notifications.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                           <img src="{{ asset('kejalogo.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-pink">
                                <img src="{{ asset('kejalogo.jpg') }}"
                                    class="img-circle elevation-2" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2025 <a href="https://lourdesn.github.io/Portfolio/" target="_blank">Lourdes N</a>.</strong> All rights
                reserved.
            </footer>
        </div>
        <style>
            .navbar-badge {
    font-size: 0.7rem;
    background: #ffc107;
    color: #000;
    padding: 3px 6px;
    border-radius: 50%;
}
 .navbar-badge {
        font-size: 0.7rem;
        background: #ffc107;
        color: #000;
        padding: 3px 6px;
        border-radius: 50%;
    }

    .navbar {
        position: relative;
        z-index: 1050;
    }

    .navbar .dropdown-menu {
        z-index: 1060 !important;
        top: 100% !important;
        right: 0;
    }

        </style>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
