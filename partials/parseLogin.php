<?php
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

if (isset($_POST['loginBtn'])) {
    //array to hold errors
    $form_errors = array();

//validate
    $required_fields = array('username', 'password');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if (empty($form_errors)) {

        //collect form data
        $user = $_POST['username'];
        $password = $_POST['password'];

        isset($_POST['remember']) ? $remember = $_POST['remember'] : $remember = "";

        //check if user exist in the database
        $sqlQuery = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':username' => $user));

        while ($row = $statement->fetch()) {
            $id = $row['id'];
            $hashed_password = $row['password'];
            $username = $row['username'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;

                $fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
                $_SESSION['last_active'] = time();
                $_SESSION['fingerprint'] = $fingerprint;

                if ($remember === "yes"){
                    rememberMe($id);
                }

                //call sweet alert
                echo $welcome = "<script type=\"text/javascript\">
                let timerInterval
                Swal.fire({
                type: 'success',
                title: 'Welcome Back! $username',
                html: 'You are being logged in : <b></b>',
                timer: 4000,
                timerProgressBar: false,
                onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                      b.textContent = Swal.getTimerLeft()
                    }
                  }
                }, 5)
              },
              onClose: () => {
                clearInterval(timerInterval)
              }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href='index.php';
                  }
                })
                </script>";
//                redirectTo('index');
            } else {
                $result = flashMessage("Invalid username or password");
            }
        }

    } else {
        if (count($form_errors) == 1) {
            $result = flashMessage("There was one error in the form ");
        } else {
            $result = flashMessage("There were " . count($form_errors) . " error in the form ");
        }
    }
}
