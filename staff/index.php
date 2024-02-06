<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php
$pagetitle = "student";
include("../template/head.php");
$page = "staff";
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
        <div class="row">
            <div class="col-12 mt-5">
            <h4>Unregistered Teachers</h4>
                <table id="unteacher" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-5">
            <h4>Registered Teachers</h4>
                <table id="teacher" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

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
    function init() {
        let url = encodeURI(`./get_unregistered_teachers.php`)
        fetch(url).then(resp => resp.json()).then(data => {
            result = data;
            const datahtml = data.map((element, index) => (
                `<tr>
                <td scope="row">${element.firstname} ${element.lastname}</td>
                <td>${element.email}</td>
                <td>${element.department}</td>
                <td>${element.phone}</td>
                <td><button onclick="activeuser('${element.email}')" class="btn btn-warning">!</button></td>
                </tr>`
            )).join("");
            document.querySelector("table#unteacher tbody").innerHTML = datahtml;
        })

        url = encodeURI(`./get_registered_teachers.php`)
        fetch(url).then(resp => resp.json()).then(data => {
            result = data;
            const datahtml = data.map((element, index) => (
                `<tr>
                <td scope="row">${element.firstname} ${element.lastname}</td>
                <td>${element.email}</td>
                <td>${element.department}</td>
                <td>${element.phone}</td>
                </tr>`
            )).join("");
            document.querySelector("table#teacher tbody").innerHTML = datahtml;
        })
    }

    function activeuser(email) {
        let url = encodeURI(`./activeuser.php?email=${email}`)
        fetch(url).then(resp => resp.text()).then(data => {
            init()
        })
    }




    init()

</script>

</html>