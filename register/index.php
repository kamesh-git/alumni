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
    <?php $page = "register"; include "../template/navbar.php"; ?>


    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;width:100vw;">
        <form class="form" method="post" action="register.php">
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
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="" required>
                    </div>
                    <div class="col ps-0">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        required>
                </div>
                <div class="row">
                    <label for="dob" class="form-label">Date of birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="" required>
                </div>
                <div class="row">
                    <label for="desig" class="form-label">Role</label>
                    <select onchange="desigtoggle(this)" class="form-control" id="desig" name="desig" placeholder="" required>
                        <option></option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <div class="row desigtoggle d-none">
                    <label for="from" class="form-label">Batch From</label>
                    <select name="from" class=" form-control" id="from">
                        <option></option>
                        <?php
                        $currentYear = date("Y");

                        // Initialize an empty array to store the years
                        $yearsArray = array();

                        // Loop from 1980 to the current year and add each year to the array
                        for ($year = 1980; $year <= $currentYear; $year++) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="row desigtoggle d-none">
                    <label for="to" class="form-label">Batch To</label>
                    <select name="to" class=" form-control" id="to">
                        <option></option>
                        <?php
                        $currentYear = date("Y");

                        // Initialize an empty array to store the years
                        $yearsArray = array();

                        // Loop from 1980 to the current year and add each year to the array
                        for ($year = 1980; $year <= $currentYear; $year++) {
                            echo "<option value=\"$year\">$year</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="row desigtoggle d-none">
                    <label for="placement" class="form-label">Placement Details:</label>
                    <textarea name="placement" id="placement" cols="30" rows="5"></textarea>
                </div>
                <div class="row">
                    <label for="address" class="form-label">Address:</label>
                    <textarea name="address" id="address" cols="30" rows="3"></textarea>
                </div>
                <div class="row">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="" required>
                </div>
                <div class="row">
                    <label for="department" class="form-label">Select Department:</label>
                    <select class="form-select" id="department" name="department" required>
                        <option></option>
                        <?php
                        include("../context/config.php");

                        $sql_check_email = "SELECT * FROM depts";
                        $stmt = sqlsrv_query($conn, $sql_check_email);
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            echo "<option value=\"" . $row["Name"] . "\">" . $row["Name"] . "</option>";
                        }

                        // print_r($row);
                        sqlsrv_free_stmt($stmt);
                        sqlsrv_close($conn);
                        ?>

                    </select>
                </div>
                <div class="row">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" required>
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
    function desigtoggle(e){
        console.log(e.value)
        if(e.value == "student"){
            document.querySelectorAll(".desigtoggle").forEach(element => {
                element.classList.remove("d-none")
                element.querySelector("select").required =true;
            });
        }
        else{
            document.querySelectorAll(".desigtoggle").forEach(element => {
                element.classList.add("d-none")
                element.querySelector("select").required =false;
            });
        }
    }
</script>

</html>