<div class="dashboard_sidebar">
        <span class="close_icon">
          <i class="far fa-bars dash_bar"></i>
          <i class="far fa-times dash_close"></i>
        </span>
    <a href="{{ route('vendor.dashboard') }}" class="dash_logo"><img src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li><a class="{{ setActive(['vendor.dashboard']) }}" href="{{ route('vendor.dashboard') }}">
                <i class="fas fa-tachometer"></i>Dashboard</a></li>
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i>Home</a></li>
        <li><a class="{{ setActive(['vendor.orders.*']) }}" href="{{ route('vendor.orders.index') }}">
                <i class="fas fa-box"></i> Orders</a></li>
        <li><a class="{{ setActive(['vendor.products.*']) }}"  href="{{ route('vendor.products.index') }}">
                <i class="fas fa-tachometer"></i>Products</a></li>
        <li><a class="{{ setActive(['vendor.shop-profile.*']) }}"  href="{{ route('vendor.shop-profile.index') }}">
                <i class="fas fa-shopping-basket"></i>Shop Profile</a></li>
        <li><a class="{{ setActive(['vendor.profile']) }}"  href="{{ route('vendor.profile') }}">
                <i class="far fa-user"></i>My Profile</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                @csrf
                <a href="{{ route('logout') }}"><i class="far fa-sign-out-alt"></i>{{ __('Log Out') }}</a>
            </form>
        </li>
    </ul>
</div>
