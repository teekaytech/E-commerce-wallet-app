
<div class="w-75">
    <a type="button" id="sidebarCollapse" class="btn p-0">
        <span class="h1">Simple eWallet System</span>
    </a>
</div>
<div class="w-25 ">
    <div class="d-flex justify-content-end">
        <div class="text-right px-2 pt-2">
            <span class="d-block"> {{ ucfirst($customer->firstname).' '.strtoupper($customer->lastname) }}</span>
            <a href="{{ route('customer.logout') }}" class="text-white">Logout</a>
        </div>
        <div class="">
            <img src="/assets/img/avatar.png" alt="user-image" class="img-fluid img-thumbnail user-img">
        </div>
    </div>
</div>
