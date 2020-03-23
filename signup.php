
<?php
$page_title = "User Authentication System - Registration";
include_once "partials/headers.php";
include_once "partials/parseSignup.php";
?>


<div class="container mt-5">
    <section class="col col-lg-8 offset-2 pt-5">
        <h2>Registration Form</h2><hr>
        <?php if(isset($result)) echo $result; ?>
        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

        <form  method="post" action="">
            <div class="form-group">
                <label for="emailField">Email address</label>
                <input type="email" name="email" class="form-control" id="emailField" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="usernameField">User name</label>
                <input type="text" name="username" class="form-control" id="usernameField" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="passwordField">Password</label>
                <input type="password" name="password" class="form-control" id="passwordField">
            </div>
            <button type="submit" name="signupBtn" class="btn btn-primary float-right">Signup</button>
        </form>
    </section>
</div>


<?php
include_once "partials/footers.php";
?>



</body>
</html>