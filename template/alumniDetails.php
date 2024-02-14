<div class="modal fade" id="alumniDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="mb-4">Add Notification</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4 d-flex justify-content-center"><img style="width:100%" src="" alt=""></div>
            <div class="col-8">
                Email: <span id="email"></span> <br>
                Department: <span id="department"></span> <br>
                Batch: <span id="batch"></span> <br>
                Phone: <span id="phone"></span> <br>
                Placement: <span id="placement"></span> <br>
                Address: <span id="address"></span> <br>

            </div>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="container mt-5 bg-light p-5" data-aos="fade-left" data-aos-duration="500">
    <h4 style="font-family: 'Libre Baskerville', serif;"> Alumni Details: </h4>
    <table id="alumniquerytable" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Batch</th>
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
        let studentdata;
        function init() {
            let url = encodeURI(`/alumni/student/get_registered_students.php`)
            fetch(url).then(resp => resp.json()).then(data => {
                studentdata = data
                const datahtml = data.map((element, index) => (
                    `<tr onclick="showStudent(${index})" data-bs-toggle="modal" data-bs-target="#alumniDetailsModal">
                <td scope="row">${element.firstname} ${element.lastname}</td>
                <td>${element.email}</td>
                <td>${element.from} - ${element.to}</td>
                <td>${element.department}</td>
                <td>${element.phone}</td>
                </tr>`
                )).join("");
                document.querySelector("#alumniquerytable tbody").innerHTML = datahtml;
            })
        }

        function showStudent(index){
            const data = studentdata[index];
            const modal =document.querySelector("#alumniDetailsModal")
            modal.querySelector("h2").innerHTML = `${data["firstname"]} ${data["lastname"]}`;
            modal.querySelector("img").src = `/alumni/userphoto/${data.email}${data.photo}`;
            modal.querySelector("#email").innerHTML = data["email"];
            modal.querySelector("#batch").innerHTML = `${data.from} - ${data.to}`;
            modal.querySelector("#department").innerHTML = data["department"];
            modal.querySelector("#phone").innerHTML = data["phone"];
            modal.querySelector("#placement").innerHTML = data["placement"];
            modal.querySelector("#address").innerHTML = data["address"];


        }


        init();
    </script>
</div>