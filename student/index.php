<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php
$pagetitle = "student";
include("../template/head.php");
include "../template/navbar.php";
?>

<head>
    <style>
        label {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="addstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="modalform">
                            <label for="rollNumber">Roll Number:</label><br>
                            <input type="text" id="rollNumber" name="rollNumber" class="form-control" required><br>

                            <label for="name">Name:</label><br>
                            <input type="text" id="name" name="name" class="form-control" required><br>

                            <label for="program">Department: </label><br>
                            <select class="form-control" name="program" id="program">
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
                            </select><br>
                            <label for="batch">Batch:</label><br>
                            <select name="batch" class="form-control" id="batch" required>
                                <option></option>
                                <?php
                                include("../context/config.php");

                                $sql_check_email = "SELECT * FROM batch";
                                $stmt = sqlsrv_query($conn, $sql_check_email);
                                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                    echo "<option value=\"" . $row["FROM"] . "-" . $row["TO"] . "\">" . $row["FROM"] . "-" . $row["TO"] . "</option>";
                                }

                                // print_r($row);
                                sqlsrv_free_stmt($stmt);
                                sqlsrv_close($conn);
                                ?>
                            </select><br>

                            <label for="phone">Phone:</label><br>
                            <input type="text" id="phone" name="phone" class="form-control" required><br>

                            <label for="address">Address:</label><br>
                            <textarea type="text" id="address" name="address" class="form-control" required></textarea>
                            <br>


                            <label for="address">Placement:</label><br>
                            <textarea type="text" id="placement" name="placement" class="form-control"
                                required></textarea> <br><br>

                            <input type="submit" value="Submit" class="form-control">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <form action="add_batch.php" class="mt-5" id="slotbr_info" method="post" accept-charset="utf-8">
            <div class="row">
                <div class="col d-flex">
                    <label for="from">From:</label>
                    <select name="from" class=" form-control" id="from" required>
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
                <div class="col d-flex">
                    <label for="to">To:</label>
                    <select name="to" class=" form-control" id="to" required>
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
                <div class="col">
                    <button type="submit" class="btn btn-primary">Add batch</button>
                </div>
            </div>
        </form>
        <hr>
        <form class="mt-5" id="getStudentform">

            <div class="row">
                <div class="col d-flex">
                    <label for="program">Program: </label>
                    <select class="form-control" name="program" id="program" required>
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
                <div class="col d-flex">
                    <label for="batch">batch:</label>
                    <select name="batch" class="form-control" id="batch" required>
                        <option></option>
                        <?php
                        include("../context/config.php");

                        $sql_check_email = "SELECT * FROM batch";
                        $stmt = sqlsrv_query($conn, $sql_check_email);
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            echo "<option value=\"" . $row["FROM"] . "-" . $row["TO"] . "\">" . $row["FROM"] . "-" . $row["TO"] . "</option>";
                        }

                        // print_r($row);
                        sqlsrv_free_stmt($stmt);
                        sqlsrv_close($conn);
                        ?>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" onclick="addstudent()">Add Student+</button>
        </div>
        <br><br>
        <table id="querytable" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Roll no:</th>
                    <th scope="col">Name</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Program</th>
                    <th scope="col">% Result</th>
                    <th scope="col">% Attendance</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div class="modal fade" id="editstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="" id="modalform" method="post">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    let result;
    const addStudentModal = new bootstrap.Modal(document.getElementById('addstudent'));
    const editStudentModal = new bootstrap.Modal(document.querySelector("#editstudent"));

    // open add student modal
    function addstudent() {
        let modalElem = document.getElementById('addstudent');
        
        let form = document.querySelector("#getStudentform")
        let modalform = document.querySelector("#modalform")
        modalform.querySelector("#program").value = form.querySelector("select#program").value
        modalform.querySelector("#batch").value = form.querySelector("select#batch").value
        addStudentModal.show();
    };


    // add student form submit
    document.querySelector("#addstudent form").addEventListener("submit", function (event) {
        event.preventDefault();
        var formData = new FormData(this); // Constructs a FormData object from the form
        const thisform = this;

        // Convert FormData to JSON
        var jsonObject = {};
        formData.forEach(function (value, key) {
            jsonObject[key] = value;
        });
        console.log(jsonObject)
        var jsonData = JSON.stringify(jsonObject);

        // Example of sending formData as JSON via AJAX
        fetch('./add_student.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
            .then(response => response.text())
            .then(data => {
                console.log(data)
                thisform.reset();
                getStudentform();
                addStudentModal.hide();
            })
            .catch(error => console.error('Error:', error));
    })

    // GET student details
    document.getElementById("getStudentform").addEventListener("submit", getStudentform)
    function getStudentform(e) {
        if (e) e.preventDefault();
        let form = document.querySelector("#getStudentform")
        let program = form.querySelector("select#program").value
        let batch = form.querySelector("select#batch").value
        let url = encodeURI(`./get_student.php?department=${program}&batch=${batch}`)
        if(program != "" && batch!= ""){
            fetch(url).then(resp => resp.json()).then(data => {
            result = data;
            const datahtml = data.map((element, index) => (
                `<tr onclick=showdetails(${index})>
                <th scope="row">${element["RollNumber"]}</th>
                <td>${element["Name"]}</td>
                <td>${element["Batch"]}</td>
                <td>${element["Department"]}</td>
                <td>${element["Result"]}</td>
                <td>${element["Attendance"]}</td>
                </tr>`
            )).join("");
            document.querySelector("#querytable tbody").innerHTML = datahtml;
        })
        }

    }


// show edit page to edit student details
    function showdetails(index) {
        const data = result[parseInt(index)]
        const datahtml = `
                            <label for="rollNumber">Roll Number: ${data["RollNumber"]}</label><br>
                            <input type="text" id="rollNumber" name="rollNumber" value="${data["RollNumber"]}" class="form-control d-none" required>

                            <label for="name">Name:</label><br>
                            <input type="text" id="name" name="name" value="${data["Name"]}" class="form-control" required><br>

                            <label for="program">Department: </label><br>
                            <select class="form-control" value="${data["Department"]}" name="program" id="program">
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
                            </select><br>
                            <label for="batch">Batch:</label><br>
                            <select name="batch" value="${data["Batch"]}" class="form-control" id="batch" required>
                                <option></option>
                                <?php
                                include("../context/config.php");

                                $sql_check_email = "SELECT * FROM batch";
                                $stmt = sqlsrv_query($conn, $sql_check_email);
                                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                    echo "<option value=\"" . $row["FROM"] . "-" . $row["TO"] . "\">" . $row["FROM"] . "-" . $row["TO"] . "</option>";
                                }

                                // print_r($row);
                                sqlsrv_free_stmt($stmt);
                                sqlsrv_close($conn);
                                ?>
                            </select><br>

                            <label for="phone">Phone:</label><br>
                            <input type="text"  value="${data["Phone"]}" id="phone" name="phone" class="form-control" required><br>

                            <label for="address">Address:</label><br>
                            <textarea type="text" value="${data["Address"]}" id="address" name="address" class="form-control" required>${data["Address"]}</textarea>
                            <br>

                            <label for="result">% Result:</label><br>
                            <input type="number" value="${data["Result"]}" id="result" name="result" class="form-control" required><br>

                            <label for="attendance">% Attendance:</label><br>
                            <input type="number" value="${data["Attendance"]}" id="attendance" name="attendance" class="form-control" required><br>

                            <label for="placement">Placement:</label><br>
                            <textarea type="text" value="${data["Placement"]}" id="placement" name="placement" class="form-control"
                                required>${data["Placement"]}</textarea> <br><br>

                            <input type="submit" value="Submit" class="form-control">
        `
        const modalElem = document.querySelector("#editstudent")
        modalElem.querySelector(".modal-body form").innerHTML = datahtml
        modalElem.querySelector("form #program").value = data["Department"]
        modalElem.querySelector("form #batch").value = data["Batch"]
        editStudentModal.toggle()
    }

    // edit form submit event
    document.querySelector("#editstudent form").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevents the default form submission behavior

        var formData = new FormData(this); // Constructs a FormData object from the form

        // Convert FormData to JSON
        var jsonObject = {};
        formData.forEach(function (value, key) {
            jsonObject[key] = value;
        });
        console.log(jsonObject)
        var jsonData = JSON.stringify(jsonObject);

        // Example of sending formData as JSON via AJAX
        fetch('./edit_student.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
            .then(response => response.text())
            .then(data => {
                getStudentform();
                editStudentModal.hide();
            })
            .catch(error => console.error('Error:', error));
    });



</script>

</html>