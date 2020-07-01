<?php
//require_once('controllers/UserLogin.php');
//
//$status = false;
//$message = '';
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    if ((!empty($_POST['username'])) && (!empty($_POST['password']))) {
//        $data['username'] = $_POST['username'];
//        $data['password'] = $_POST['password'];
//        $user = new UserLogin();
//        if ($user->process_login()) {
//            $message = "You have been successfully logged in to your dashboard";
//            $status = true;
//            $url = "views/dashboard.php";
//            header("Refresh:2; URL='$url'");
//        }
//    } else { $message = 'Username or password cannot be empty!'; }
//}
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="">
    <main class="login-form bg-primary">
        <section class="form-box px-5 pt-5 pb-0">
            <p class="text-center login-head h5 mb-4">Customer Login</p>
            <form method="POST" action="{{ route('customer.dashboard') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4" name="login">Login</button>
                <a href="#" class="d-block">Register</a>
                <a href="#">Forget your password?</a>
            </form>
            <footer class="text-center mt-5 pb-2">
                @include('includes.footer')
            </footer>
        </section>
    </main>
</body>
</html>
