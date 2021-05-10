<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="">
    <main class="login-form bg-primary">
        <section class="form-box px-5 pt-5 pb-0">
            <p class="text-center login-head h5 mb-4">Customer Login</p>

            @include('includes._flash_messages')

            <form method="POST" action="{{ route('customer.login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4" name="login">Login</button>
                <p class="text-center my-4 text-primary font-weight-bold">
                    Available logins -> customer1@gmail.com || customer2@gmail.com
                </p>
            </form>
            <footer class="text-center mt-5 pb-2">
                @include('includes.footer')
            </footer>
        </section>
    </main>
</body>
</html>
