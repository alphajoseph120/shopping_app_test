<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('dashboard') }}" aria-expanded="false"><i class="fa-solid fa-house"></i><span
                class="nav-text">Dashboard</span></a></li>
          
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-cart-shopping"></i><span class="nav-text">Product</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('product-category') }}"><i class="fa-regular fa-circle-dot" style="font-size: 12px;"></i><span>Category</span></a></li>
                    <li><a href="{{ route('product-listing') }}"><i class="fa-regular fa-circle-dot" style="font-size: 12px;"></i><span>Details</span></a></li>
                </ul>
            </li>  
            <li><a href="{{ route('order-report') }}" aria-expanded="false"><i class="fa-solid fa-truck-fast"></i><span
                class="nav-text">Orders</span></a></li>
            <li><a href="{{ route('logout') }}" aria-expanded="false"><i class="fa-solid fa-right-from-bracket"></i><span
                class="nav-text">LogOut</span></a></li>
        </ul>
    </div>
</div>