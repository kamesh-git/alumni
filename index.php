<?php
$pagetitle = "alumni";
include("template/head.php");
$page = "home";
include("template/navbar.php");

?>


<body style="background-color:#e0e0e0;">

    <div class="container mt-5" data-aos="fade-up" data-aos-duration="500">
        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item carousel-item-next carousel-item-start">
                    <img src="/college/assets/college.jpg" width="100%" alt="">

                </div>
                <div class="carousel-item">
                    <img src="/college/assets/college.jpg" width="100%" alt="">

                </div>
                <div class="carousel-item active carousel-item-start">
                    <img src="/college/assets/college.jpg" width="100%" alt="">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-5 bg-light" data-aos="fade-up" data-aos-duration="500">
        <div class="card pb-3" style="background: transparent;">
            <div class="row align-items-center g-0">
                <div class="col-lg-5"><img src="/college/assets/college.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-lg-7">
                    <div class="card-body" style="text-align: justify;">
                        <p class="card-text about-text">Government Polytechnic College, R.K. Nagar, Chennai was
                            established by Government of Tamil Nadu in the
                            year 2016, to cater to the needs and aspirations of the R.K. Nagar people who cannot afford
                            the costly
                            technical education offered by the private institutions.
                        </p><br>
                        <p class="card-text about-text"> This college started functioning first in the Central
                            Polytechnic College campus at Tharamani, Chennai
                            and then after the completion of building works and establishment of laboratories was
                            shifted to the
                            present location in the year 2017. The college can be reached by using both railway and bus
                            way. By
                            using Railway, it is very nearer to V.O.C. Nagar Railway station and it has bus facilities
                            from various
                            locations of city.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" data-aos="fade-up" data-aos-duration="500">
        <h2>Notifications</h2>
        <div style="max-height:400px; overflow-y:scroll; " id="notifications" class="row mt-3 bg-light pt-3">
            <div class="alert alert-danger" role="alert">
                No Notifications
            </div>
        </div>
    </div>

    <?php include("./template/staffDetails.php"); ?>

    <?php include("./template/alumniDetails.php"); ?>

    <?php include("./template/footer.php"); ?>

    <script>
        // Fetch notifications from PHP script
        function notificationinit(){
            fetch('/alumni/notification/get_notifications.php')
            .then(response => response.json())
            .then(data => {
                const notificationsContainer = document.getElementById('notifications');
                if (data.length > 0) notificationsContainer.innerHTML = "";

                data.forEach(notification => {
                    const card = document.createElement('div');
                    card.classList.add('col-md-12', 'mb-3');

                    const cardBody = document.createElement('div');
                    cardBody.classList.add('card', 'h-100', 'cursor-pointer');

                    const cardTitle = document.createElement('div');
                    cardTitle.classList.add('card-body');
                    cardTitle.innerHTML = `
                    <div class="d-flex justify-content-between">
                    <h5 class="card-title"> ${notification.title} </h5>
                    <div>
                    <button type="button" class="btn btn-outline-success view-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                </svg>
                </button>
                    <?php
                    if (isset($_SESSION["admin"]))
                    if ($_SESSION["admin"])
                    echo '
                
                <button type="button" class="btn btn-outline-danger delete-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                    </svg>
                    </button>';
                    ?>
                    </div>
                    </div>
                    <p class = "m-0">Created By:</p>
                    <small class="card-text fw-light">${notification.name}</small><br>
                    <small class="card-text fw-light">${notification.email}</small><br>
                    <small class="card-text fw-light">${notification.created_at.date.split(" ")[0]}</small>`;


                    cardBody.appendChild(cardTitle);

                    card.appendChild(cardBody);
                    notificationsContainer.appendChild(card);

                    // delete click event to toggle description display
                    if(card.querySelector(".delete-button")){
                    card.querySelector(".delete-button").addEventListener('click', () => {
                        const URI = `/alumni/notification/deleteNotification.php?id=${notification.ID}`
                        fetch(URI).then(resp => resp.text()).then(data => {console.log(data);location.reload();}).catch(err => console.log(err))
                    })
                }


                    // Add click event to toggle description display
                    card.querySelector(".view-button").addEventListener('click', () => {
                        const title = notification.title;
                        const description = notification.description;

                        // Create the modal content
                        const modalContent = `
                            <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="notificationModalLabel">${title}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>${description}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                        // Append the modal content to the body
                        document.body.insertAdjacentHTML('beforeend', modalContent);

                        // Show the modal
                        const notificationModal = new bootstrap.Modal(document.getElementById('notificationModal'));
                        notificationModal.show();

                        // Remove the modal from the DOM after it's hidden
                        notificationModal._element.addEventListener('hidden.bs.modal', function () {
                            document.getElementById('notificationModal').remove();
                        });
                    });

                });
            })
            .catch(error => console.error('Error fetching notifications:', error));

        }

        notificationinit()
    </script>

</body>