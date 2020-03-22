<?php
include_once 'resource/session.php';
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

if(isset($_POST['loginBtn'])){
    //array to hold errors
    $form_errors = array();

//validate
    $required_fields = array('username', 'password');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if(empty($form_errors)){

        //collect form data
        $user = $_POST['username'];
        $password = $_POST['password'];

        //check if user exist in the database
        $sqlQuery = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':username' => $user));

       while($row = $statement->fetch()){
           $id = $row['id'];
           $hashed_password = $row['password'];
           $username = $row['username'];

           if(password_verify($password, $hashed_password)){
               $_SESSION['id'] = $id;
               $_SESSION['username'] = $username;
               redirectTo('index');
           }else{
               $result = flashMessage("Invalid username or password");
           }
       }

    }else{
        if(count($form_errors) == 1){
            $result = flashMessage("There was one error in the form ");
        }else{
            $result = flashMessage("There were " .count($form_errors). " error in the form ");
        }
    }
}
?>

<?php
$page_title = "User Authentication System - Login Page";
include_once "partials/headers.php";
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
                <input name="remember" type="checkbox" class="form-check-input" id="checkBox">
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