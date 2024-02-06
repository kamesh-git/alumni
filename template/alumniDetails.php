<div class="container mt-5 bg-light p-5" data-aos="fade-left" data-aos-duration="500">
    <h4 style="font-family: 'Libre Baskerville', serif;"> Alumni Details: </h4>
    <table id="alumniquerytable" class="table table-hover">
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

    <div class="modal fade" id="studentsmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="modalform">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const studentsmodal = new bootstrap.Modal(document.querySelector("#studentsmodal"));
        function init() {
            let url = encodeURI(`/alumni/student/get_registered_students.php`)
            fetch(url).then(resp => resp.json()).then(data => {
                const datahtml = data.map((element, index) => (
                    `<tr>
                <td scope="row">${element.firstname} ${element.lastname}</td>
                <td>${element.email}</td>
                <td>${element.department}</td>
                <td>${element.phone}</td>
                </tr>`
                )).join("");
                document.querySelector("#alumniquerytable tbody").innerHTML = datahtml;
            })
        }


        init();
    </script>
</div>