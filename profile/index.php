<!DOCTYPE html>
<html lang="en">
<?php
$pagetitle = "register";
include("../template/head.php");
?>

<head>
    <style>
        form .row {
            margin-bottom: 20px;

        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "../template/navbar.php";
    ?>


    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;width:100vw;">
        <form class="form" method="post" action="edit_profile.php">
            <fieldset>
                <h3 class="text-center mb-3">Staff Registration</h3>
                <?php
                // Check if there are any error messages                
                if (isset($_SESSION['reg_error']) != "")
                    echo "<div class=\"alert alert-danger text-center\" role=\"alert\">" . $_SESSION['reg_error'] . "
              </div>";


                unset($_SESSION["reg_error"]);
                ?>
                <div class="row">
                    <div class="col ps-0">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" value=<?php echo $_SESSION["user_details"]["firstname"] ?> name="firstname"
                            class="form-control" id="firstname" placeholder="" required>
                    </div>
                    <div class="col ps-0">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" value=<?php echo $_SESSION["user_details"]["lastname"] ?> name="lastname"
                            class="form-control" id="lastname" placeholder="" required>
                    </div>
                </div>
                <div class="row">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" value=<?php echo $_SESSION["user_details"]["email"] ?> class="form-control"
                        id="email" name="email" placeholder="name@example.com" required>
                </div>
                <div class="row">
                    <label for="dob" class="form-label">Date of birth</label>
                    <input type="date" value=<?php echo $_SESSION["user_details"]["dob"]->format('Y-m-d'); ?> class="form-control" id="dob" name="dob" placeholder="" required>
                </div>
                <div class="row">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" value=<?php echo $_SESSION["user_details"]["phone"] ?> class="form-control"
                        id="phone" name="phone" placeholder="" required>
                </div>
                <div class="row">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value=<?php echo $_SESSION["user_details"]["password"] ?>
                        class="form-control" id="password" name="password" placeholder="" required>
                </div>
                <div class="row">
                    <button class="btn btn-primary">Save</button>
                </div>
            </fieldset>
        </form>
    </div>


</body>

</html>