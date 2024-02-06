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
    <?php $page = "profile"; include "../template/navbar.php"; ?>


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
                            class="form-control" id="lastname" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" value=<?php echo $_SESSION["user_details"]["email"] ?> class="form-control"
                        id="email" name="email" placeholder="name@example.com" required>
                </div>
                <div class="row">
                    <label for="dob" class="form-label">Date of birth</label>
                    <input type="date" value=<?php echo $_SESSION["user_details"]["dob"]->format('Y-m-d'); ?>
                        class="form-control" id="dob" name="dob" placeholder="" required>
                </div>
                <div class=<?php if ($_SESSION["user_details"]["desig"] == "teacher")
                    echo "d-none";
                else
                    echo "row";
                ?>>
                    <label for="placement" class="form-label">Placement Details:</label>
                    <textarea name="placement" value=<?php echo $_SESSION["user_details"]["placement"] ?> id="placement"
                        cols="30" rows="5"><?php echo $_SESSION["user_details"]["placement"] ?></textarea>
                </div>

                <div class="row">
                    <label for="address" class="form-label">Address:</label>
                    <textarea name="address" value=<?php echo $_SESSION["user_details"]["address"] ?> id="address"
                        cols="30" rows="3"><?php echo $_SESSION["user_details"]["address"] ?></textarea>
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
                    <button class="btn btn-primary">Submit</button>
                </div>
                <div class="row">
                    <small class="text-secondary">Already an User? <a class="text-dark" href="/alumni/login">Log
                            in</a></small>
                </div>

            </fieldset>
        </form>
    </div>


</body>

<script>
    
</script>

</html>