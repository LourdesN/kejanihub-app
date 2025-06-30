<aside class="main-sidebar elevation-4" style="background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%); color: #fff; font-family: 'Poppins', sans-serif;">

    {{-- Brand Logo --}}
    <a href="{{ route('home') }}" class="brand-link" style="background: transparent; border-bottom: 1px solid rgba(255, 255, 255, 0.3);">
        <img src="{{ asset('kejalogo.jpg') }}"
             alt="Kejahub Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-bold" style="color: #FC466B;">{{ config('app.name') }}</span>
    </a>

    {{-- Sidebar --}}
    <div class="sidebar" style="backdrop-filter: blur(10px);">

        {{-- Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                @include('layouts.menu')

            </ul>
        </nav>
        {{-- /.sidebar-menu --}}
    </div>
    {{-- /.sidebar --}}
</aside>
<style>
.main-sidebar {
    background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%) !important;
    font-family: 'Poppins', sans-serif;
}

.main-sidebar .nav-sidebar > .nav-item > .nav-link {
    color: #111 !important;
}

.main-sidebar .nav-sidebar > .nav-item > .nav-link.active {
    background-color: #EEAECA !important;
    border-radius: 8px;
}

.brand-link {
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
}
.brand-image {
    width: 30px;
    height: 60px;
}
</style>