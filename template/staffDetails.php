<div class="container mt-5 bg-light p-5" data-aos="fade-left" data-aos-duration="500">
    <h4 style="font-family: 'Libre Baskerville', serif;"> Staff Details: </h4>
    <table id="querytable" class="table table-hover">
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

    <div class="modal fade" id="teachersmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
        let result;
        const teachersmodal = new bootstrap.Modal(document.querySelector("#teachersmodal"));
        function init() {
            let url = encodeURI(`/alumni/staff/get_registered_teachers.php`)
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
                document.querySelector("#querytable tbody").innerHTML = datahtml;
            })
        }


        init();
    </script>
</div>