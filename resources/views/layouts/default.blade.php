<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <div class="wrapper">
        @include('includes.sidebar')
    </div>

    <div id="content" class="content">
        <header class="content-header p-2 d-flex flex-row justify-content-between text-white">
            @include('includes.header')
        </header>
        @include('includes._flash_messages')

        @yield('content')

        <footer class="footer">
            @include('includes.footer')
        </footer>
    </div>

    @include('includes.footer_scripts')
</body>
</html>
