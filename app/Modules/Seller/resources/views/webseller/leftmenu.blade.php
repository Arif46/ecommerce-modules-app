<div class="account-widget">
        <h4>My account</h4>
        <ul class="footer-widget-list">
            <li><a href="{{ route('seller.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('seller.my.product') }}">Product</a></li>
            <li><a href="{{ route('seller.payment.index') }}">Payment</a></li>            
            <!-- <li><a href="{{ route('seller.delivery.option') }}">Delivery Option</a></li> -->
            <li><a href="{{ route('seller.coupon') }}">Coupon</a></li>            
            <li><a href="{{ route('seller.order.index') }}">My Order</a></li>
            <li><a href="{{ route('seller.profile') }}">Profile </a></li>            
            <li><a href="{{route('seller.logout')}}">Logout</a></li>
        </ul>
    </div>