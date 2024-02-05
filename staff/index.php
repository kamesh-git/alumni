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

        <form action="add_dept.php" class="mt-5" id="slotbr_info" method="post" accept-charset="utf-8">
            <div class="row">
                <div class="col d-flex">
                    <label style="width:max-content;" for="dept">Department:</label>
                    <input class="form-control" id="dept" name="dept" type="text">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Add Department</button>
                </div>
            </div>
        </form>
        <table id="querytable" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Leave</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>


        <div class="modal fade" id="editTeachers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
    const editTeachersModal = new bootstrap.Modal(document.querySelector("#editTeachers"));
    function init(){
        let url = encodeURI(`./get_teachers.php`)
    fetch(url).then(resp => resp.json()).then(data => {
        result = data;
        const datahtml = data.map((element, index) => (
            `<tr onclick=showdetails(${index})>
                <td scope="row">${element.firstname} ${element.lastname}</td>
                <td>${element.email}</td>
                <td>${element.department}</td>
                <td>${element.salary}</td>
                <td>${element.leave}</td>
                <td>${element.phone}</td>
                </tr>`
        )).join("");
        document.querySelector("#querytable tbody").innerHTML = datahtml;
    })
    }


    // show edit page to edit teacher details
    function showdetails(index) {
        const data = result[parseInt(index)]
        console.log(data)
        const datahtml = `

                            <label class="d-none" for="email">Email:</label>
                            <input type="email" id="email" name="email" value="${data["email"]}" class="form-control d-none" required>
                            
                            <label for="department">Department: </label><br>
                            <select class="form-control" value="${data["department"]}" name="department" id="department">
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

                            <label for="salary">Salary:</label><br>
                            <input type="number" value="${data["salary"]}" id="salary" name="salary" class="form-control" required />
                            <br>

                            <label for="leave">Leave:</label><br>
                            <input type="number" value="${data["leave"]}" id="leave" name="leave" class="form-control" required />
                            <br><br>

                            <input type="submit" value="Submit" class="form-control">
        `
        const modalElem = document.querySelector("#editTeachers")
        modalElem.querySelector(".modal-body form").innerHTML = datahtml
        modalElem.querySelector("form #department").value = data["department"]
        editTeachersModal.show()

    }
    document.querySelector("#editTeachers .modal-body form").addEventListener("submit",function(event){
        event.preventDefault();
        var formData = new FormData(this); // Constructs a FormData object from the form

        // Convert FormData to JSON
        var jsonObject = {};
        formData.forEach(function (value, key) {
            jsonObject[key] = value;
        });
        console.log(jsonObject)
        var jsonData = JSON.stringify(jsonObject);
        console.log(jsonData)
        console.log(new Error("stop"))

        // Example of sending formData as JSON via AJAX
        fetch('./edit_teachers.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
            .then(response => response.text())
            .then(data => {
                init();
                editTeachersModal.hide()
            })
            .catch(error => console.error('Error:', error));
    })


    init()

</script>

</html>