<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Buenavista Water District</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="icon" href="public/assets/wdLogo.jpg" type="image/x-icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0" >
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0" style="background-color:white;">
            <a href="index.php" class="navbar-brand p-4 d-flex align-items-center">
                <img src="public/assets/wdLogo.jpg" alt="Water District Logo" style="height: 60px;">
                <h4 class="text-primary m-0 ms-3">Buenavista Water District</h4>
            </a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#home" class="nav-item nav-link" id="homeLink">Home</a>
                    <a href="#services" class="nav-item nav-link" id="aboutLink">About</a>
                    <a href="#opportunities" class="nav-item nav-link" id="servicesLink">Opportunities</a>
                </div>
                <a href="http://localhost/smarthr/login.php" class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">Login</a>
            </div>
            </nav>

            <!-- Carousel Start -->
            <div id="home" class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="img/carousel-1.png" class="img-fluid w-100" alt="Image">
                            <div class="carousel-caption-1">
                                <div class="carousel-caption-1-content" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;" style="letter-spacing: 3px;">Welcome to Buenavista Water District</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1.3s" style="animation-delay: 1.3s;">Providing clean, safe water to our community for generations.</h1>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="Image">
                            <div class="carousel-caption-2">
                                <div class="carousel-caption-2-content" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4 fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;" style="letter-spacing: 3px;">Welcome to Buenavista Water District</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4 fadeInRight animated" data-animation="fadeInRight" data-delay="1.3s" style="animation-delay: 1.3s;">Providing clean, safe water to our community for generations.</h1>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn btn-primary fadeInLeft animated" aria-hidden="true" data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"> <i class="fa fa-angle-left fa-3x"></i></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn btn-primary fadeInRight animated" aria-hidden="true" data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"><i class="fa fa-angle-right fa-3x"></i></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        <!-- Navbar & Hero End -->

        <!-- services Start -->
        <div  id="services" class="container-fluid feature bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Our Services</h4>
                    <h3 class="display-3 text-capitalize mb-3">Trusted Water Solutions for Every Need</h3>
                </div>
                <div class="row g-4">
                    <div class=" col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4">
                            <div class="feature-icon mb-3"><i class="fas fa-home text-white fa-3x"></i></div>
                            <a href="#!" class="h4 mb-3">Residential Water</a>
                            <p class="mb-3">Clean, reliable water for your home, 24/7.</p>
                           
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="feature-item p-4">
                            <div class="feature-icon mb-3"><i class="fas fa-leaf text-white fa-3x"></i></div>
                            <a href="#!" class="h4 mb-3">Conservation</a>
                            <p class="mb-3">Programs to help you save water and money.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="feature-item p-4">
                            <div class="feature-icon mb-3"><i class="fas fa-phone text-white fa-3x"></i></div>
                            <a href="#" class="h4 mb-3">24/7 Support</a>
                            <p class="mb-3">Always here to help with your water needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- services End -->

        <!-- Opportunities Start -->
     
        <div id="opportunities" class="container-fluid blog pb-5">
            <div class="container pb-5 mt-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary" style="margin-top:50px;">Job Opportunities</h4>
                    <h3 class="display-3 text-capitalize mb-3">Build Your Career With Us</h3>
                </div>

                <?php
                require "database/connection.php";
                $openJobs = $conn->prepare("SELECT * FROM jobs WHERE status = 'Open'");
                $openJobs->execute();
                $openResult = $openJobs->get_result();

                $jobs = [];
                while ($openRow = $openResult->fetch_assoc()) {
                    $jobs[] = $openRow;
                }
                ?>

                <?php if (!empty($jobs)): ?>
                    <div class="row g-4 justify-content-center">
                        <?php foreach ($jobs as $job): ?>
                            <div class="col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="blog-item">
                                    <div class="blog-content rounded-bottom p-4">
                                        <a href="view.php?open_job=<?php echo htmlspecialchars($job['job_id']) ?>" class="h4 d-inline-block mb-3">
                                            <?php echo htmlspecialchars($job['job_position']); ?>
                                        </a>
                                        <p><strong>Place of Work:</strong> <?php echo htmlspecialchars($job['place']); ?></p>
                                        <p><strong>Open Position:</strong> <?php echo htmlspecialchars($job['open_position']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center">
                        <p style="color:red;">No Open Job Opportunities</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Opportunities End -->
        
        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                
                <div class="row g-5">
                   
                    <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Business Hours</h4>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Mon - Friday:</h6>
                                <p class="text-white mb-0">08:00 am to 05.00 pm</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Saturday:</h6>
                                <p class="text-white mb-0">Closed</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Sunday:</h6>
                                <p class="text-white mb-0">Closed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <a href="#home"><i class="fas fa-angle-right me-2"></i> Home</a>
                            <a href="#services"><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href="#opportunities"><i class="fas fa-angle-right me-2"></i> Opportunities</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <a href="#"><i class="fa fa-map-marker-alt me-2"></i>Rizal Ave., Barangay 3,  Buenavista, <br>
                            Agusan del Norte</a>
                         
                            <a href="tel:+(085) 808 0055"><i class="fas fa-phone me-2"></i> (085) 808 0055 (PLDT)</a>
                            <a href="tel:+(0998) 977 1038 "><i class="fas fa-phone me-2"></i>(0998) 977 1038 (SMART)</a>
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container d-flex justify-content-center align-items-center">
                <span class="text-body text-center">
                    <a href="#" class="border-bottom text-white">
                        <i class="fas fa-copyright text-light me-2"></i>Water District
                    </a>, All rights reserved.
                </span>
            </div>
        </div>
        <!-- Copyright End -->

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    const navLinks = document.querySelectorAll('.nav-item');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navLinks.forEach(link => link.classList.remove('active'));
            
            this.classList.add('active');
        });
    });
    </script>
    </body>
</html>