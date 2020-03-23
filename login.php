<?php
$page_title = "User Authentication System - Login Page";
include_once "partials/headers.php";
include_once "partials/parseLogin.php";
?>


<div class="container mt-5">
    <section class="col col-lg-8 offset-2 pt-5">
        <h2>Login Form</h2><hr>
        <?php if(isset($result)) echo $result; ?>
        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

        <form  method="post" action="">
            <div class="form-group">
                <label for="usernameField">Username</label>
                <input type="text" name="username" class="form-control" id="usernameField" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="passwordField">Password</label>
                <input type="password" name="password" class="form-control" id="passwordField">
            </div>
            <div class="form-group form-check">
                <input name="remember" value="yes" type="checkbox" class="form-check-input" id="checkBox">
                <label class="form-check-label" for="checkBox">Remember Me</label>
            </div>
            <a href="forgot_password.php">Forgot Password?</a>
            <button type="submit" name="loginBtn" class="btn btn-primary float-right">Sign in</button>
        </form>
    </section>
</div>


<?php
include_once "partials/footers.php";
?>
</body>
</html>