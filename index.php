<?php
$page_title = "User Authentication System - Homepage";
include_once "partials/headers.php";
?>


<main role="main">

    <section class="text-center pt-5">
        <div class="container">
            <h1>User Authentication System</h1>
            <?php if (!isset($_SESSION['username'])): ?>
                <P class="lead">You are currently not signin <a href="login.php">Login</a> Not yet a member? <a
                            href="signup.php">Signup</a></P>
            <?php else: ?>
                <p class="lead">You are logged in
                    as <?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a>
                </p>
            <?php endif ?>
        </div>
    </section>

</main>


<?php
include_once "partials/footers.php";
?>
</body>
</html>