<!DOCTYPE html>
<html lang="en">
<?php
$pagetitle = "register";
include("../template/head.php");
$page = "login";
include "../template/navbar.php";
?>

<head>
    <style>
        form .row {
            margin-bottom: 20px;

        }
    </style>
</head>

<body>


    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;width:100vw;">
        <form class="form" method="post" action="login.php">
            <fieldset>
                <h3 class="text-center mb-3">Staff Login</h3>
                <?php
                // Check if there are any error messages                
                if (isset($_SESSION['login_error']) != "")
                    echo "<div class=\"alert alert-danger text-center\" role=\"alert\">" . $_SESSION['login_error'] . "
              </div>";


                unset($_SESSION["login_error"]);
                ?>
                <div class="row">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        required>
                    <div class="row">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder=""
                            required>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary">Log in</button>
                    </div>
                    <div class="row">
                        <small class="text-secondary">Not an User? <a class="text-dark"
                                href="/alumni/register">register</a></small>
                    </div>

            </fieldset>
        </form>
    </div>


</body>

</html>