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
                    <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="550"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555"
                            dy=".3em">First slide</text>
                    </svg>

                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="550"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#666"></rect><text x="50%" y="50%" fill="#444"
                            dy=".3em">Second slide</text>
                    </svg>

                </div>
                <div class="carousel-item active carousel-item-start">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="550"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#555"></rect><text x="50%" y="50%" fill="#333"
                            dy=".3em">Third slide</text>
                    </svg>

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

    <div class="container mt-5 bg-light" data-aos="fade-right" data-aos-duration="500">
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
    
    <?php include("./template/staffDetails.php"); ?>

    <?php include("./template/alumniDetails.php"); ?>

    <?php include("./template/footer.php"); ?>



</body>