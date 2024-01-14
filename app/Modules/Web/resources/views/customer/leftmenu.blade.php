<div class="account-widget">
        <h4>My account</h4>
        <ul class="footer-widget-list">
            <li><a href="{{route('customer.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('customer.profile') }}">Profile</a></li>
            <li><a href="{{ route('customer.address') }}">Address</a></li>
            <li><a href="{{ route('customer.wishlist') }}">Wishlist</a></li>
            <li><a href="{{ route('customer.review') }}">Reviews</a></li>
            <li><a href="{{ route('customer.order') }}">My Order</a></li>
            <li><a data-toggle="modal" data-target="#chanePasswordModal" href="#">Password</a></li>
            <li><a href="{{route('customer.logout')}}">Logout</a></li>
        </ul>
    </div>