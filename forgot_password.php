

<?php
$page_title = "Password Reset Page";
include_once "partials/headers.php";
include_once "partials/parsePasswordReset.php";
?>

<div class="container mt-5">
    <section class="col col-lg-8 offset-2 pt-5">
        <h2>Password Reset Form</h2><hr>
        <?php if(isset($result)) echo $result; ?>
        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

        <form  method="post" action="">
            <div class="form-group">
                <label for="emailField">Email address</label>
                <input type="email" name="email" class="form-control" id="emailField" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="passwordField">New Password</label>
                <input type="password" name="new_password" class="form-control" id="passwordField">
            </div>
            <div class="form-group">
                <label for="passwordField2">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="passwordField2">
            </div>
            <button type="submit" name="passwordResetBtn" class="btn btn-primary float-right">Reset Password</button>
        </form>
    </section>
</div>


<?php
include_once "partials/footers.php";
?>
</body>
</html>