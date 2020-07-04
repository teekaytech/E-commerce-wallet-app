<nav id="sidebar">
    <div class="sidebar-header text-center">
        <a href="{{ route('customer.dashboard') }}">
            <img src="#" alt="Company Logo" class="py-5">
        </a>
    </div>
    <ul class="list-unstyled components py-4">
        <li><a href="{{ route('customer.dashboard') }}">Home</a></li>
        <li>
            <a href="#RegSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Wallet </a>
            <ul class="collapse list-unstyled" id="RegSubmenu">
                <li class="sub-list"><a href="{{ route('customer.preload_wallet',$customer->id ) }}">Pre-load Wallet (Debit Card)</a></li>
                <li class="sub-list"><a href="{{ route('customer.new_transfer',$customer->id) }}">Send Virtual Gift (Transfer)</a></li>
            </ul>
        </li>
        <li><a href="{{ route('customer.logout') }}">Logout</a></li>
    </ul>
</nav>

