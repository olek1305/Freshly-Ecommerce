<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Freshly Ecommerce</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">Fres</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i>Home</a>
            </li>
            <li class="menu-header">Starter</li>

            <li class="dropdown {{ setActive([
                    'admin.category.*',
                    'admin.sub-category.*',
                    'admin.child-category.*'
                    ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link" href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                    <li class="{{ setActive(['admin.child-category.*']) }}"><a class="nav-link" href="{{ route('admin.child-category.index') }}">Child Category</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive([
                    'admin.brand.*',
                    'admin.products.*',
                    'admin.products-image-gallery.*',
                    'admin.products-variant.*',
                    'admin.products-variant-item.*',
                    'admin.seller-products.*',
                    'admin.seller-pending-products.*'
                    ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link" href="{{ route('admin.brand.index') }}">Brands</a></li>
                    <li class="{{ setActive([
                        'admin.products.*',
                        'admin.products-image-gallery.*',
                        'admin.products-variant.*',
                        'admin.products-variant-item.*',
                        ]) }}"><a class="nav-link" href="{{ route('admin.products.index') }}">Products</a></li>
                    <li class="{{ setActive(['admin.seller-products.*']) }}"><a class="nav-link" href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                    <li class="{{ setActive(['admin.seller-pending-products.*']) }}"><a class="nav-link" href="{{ route('admin.seller-pending-products.index') }}">Seller Pending Products</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive([
                    'admin.orders.*',
                    'admin.pending-orders',
                    'admin.orders.processed',
                    'admin.orders.dropped-off',
                    'admin.orders.shipped',
                    'admin.orders.out-for-delivery',
                    'admin.orders.delivered',
                    'admin.orders.cancelled',
                    ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.orders.*']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">All Orders</a></li>
                    <li class="{{ setActive(['admin.orders.pending*']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.pending') }}">All Pending Orders</a></li>
                    <li class="{{ setActive(['admin.orders.processed']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.processed') }}">All Processed Orders</a></li>
                    <li class="{{ setActive(['admin.orders.dropped-off']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.dropped-off') }}">All Dropped Off Orders</a></li>
                    <li class="{{ setActive(['admin.orders.shipped']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.shipped') }}">All Shipped Orders</a></li>
                    <li class="{{ setActive(['admin.orders.out-for-delivery']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.out-for-delivery') }}">All Out For Delivery Orders</a></li>
                    <li class="{{ setActive(['admin.orders.delivered']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.delivered') }}">All Delivered Orders</a></li>
                    <li class="{{ setActive(['admin.orders.cancelled']) }}">
                        <a class="nav-link" href="{{ route('admin.orders.cancelled') }}">All Cancelled Orders</a></li>
                </ul>
            </li>

            <li class="{{ setActive(['admin.transaction']) }}">
                <a class="nav-link" href="{{ route('admin.transaction') }}"><i class="fas fa-money-bill-alt"></i>Transactions</a>
            </li>

            <li class="dropdown {{ setActive([
                    'admin.vendor-profile.*',
                    'admin.flash-sale.*',
                    'admin.coupons.*',
                    'admin.shipping-rule.*',
                    'admin.payment-settings.*'
                    ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link" href="{{ route('admin.vendor-profile.index') }}">Vendor Profile</a></li>
                    <li class="{{ setActive(['admin.coupons.*']) }}"><a class="nav-link" href="{{ route('admin.coupons.index') }}">Coupons</a></li>
                    <li class="{{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link" href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a></li>
                    <li class="{{ setActive(['admin.flash-sale.*']) }}"><a class="nav-link" href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
                    <li class="{{ setActive(['admin.payment-settings.*']) }}"><a class="nav-link" href="{{ route('admin.payment-settings.index') }}">Payment Setting</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive([
                    'admin.slider.*',
                    ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Website</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.slider.*']) }}">
                        <a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a></li>
                    <li class="{{ setActive(['admin.home-page-setting.*']) }}">
                        <a class="nav-link" href="{{ route('admin.home-page-setting') }}">Home Page Setting</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="far fa-square"></i> <span>Settings</span></a></li>
        </ul>

      </aside>
</div>
