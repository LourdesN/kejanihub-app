<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="fas fa-chart-line"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('houses.index') }}" class="nav-link {{ Request::is('houses*') ? 'active' : '' }}">
        <i class="fas fa-home"></i>
        <p>Houses</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('units.index') }}" class="nav-link {{ Request::is('units*') ? 'active' : '' }}">
        <i class="fas fa-building"></i>
        <p>Units</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tenants.index') }}" class="nav-link {{ Request::is('tenants*') ? 'active' : '' }}">
        <i class="fas fa-house-user"></i>
        <p>Tenants</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('leases.index') }}" class="nav-link {{ Request::is('leases*') ? 'active' : '' }}">
        <i class="fas fa-clipboard-list"></i>
        <p>Leases</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('payments.index') }}" class="nav-link {{ Request::is('payments*') ? 'active' : '' }}">
        <i class="fas fa-money-check-alt"></i>
        <p>Payments</p>
    </a>
</li>




