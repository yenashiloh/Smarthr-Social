<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Water District Buenavista</title>
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
        <style>
            body {
                padding-top: 100px; 
            }
            .navbar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1030;
                background-color: white;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            .container.mt-4 {
                margin-top: 2rem !important;
            }
        </style>
    </head>
    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0" >
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0" style="background-color:white;">
            <a href="index.php" class="navbar-brand p-4 d-flex align-items-center">
                <img src="public/assets/wdLogo.jpg" alt="Water District Logo" style="height: 60px;">
                <h3 class="text-primary m-0 ms-3">Water District</h3>
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php#home" class="nav-item nav-link" id="homeLink">Home</a>
                    <a href="index.php#about" class="nav-item nav-link" id="aboutLink">About</a>
                    <a href="index.php#opportunities" class="nav-item nav-link" id="servicesLink">Opportunities</a>
                </div>

                <a href="http://localhost/smarthr/login.php" class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">Login</a>
            </div>
            </nav>
    </header>
    <?php
        require "database/connection.php";
        if (isset($_GET['open_job'])) {
            $jobId = $_GET['open_job'];

            $fetch = $conn->prepare("SELECT * FROM jobs WHERE job_id = $jobId");
            $fetch->execute();
            $fetch_res = $fetch->get_result();
            if ($fetch_res->num_rows > 0) {
                $jobData = $fetch_res->fetch_assoc();
            }
        } else {
            header("Location: http://localhost/smarthr/");
            exit();
        }
        ?>
        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Job Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- First Column: Job Position, Plantilla Item, Pay Grade -->
                        <div class="col-md-6">
                            <!-- Job Position -->
                            <div class="mb-3">
                                <h5>Job Position</h5>
                                <p><?php echo htmlspecialchars($jobData['job_position']); ?></p>
                            </div>

                            <!-- Plantilla Item -->
                            <div class="mb-3">
                                <h5>Plantilla Item</h5>
                                <p><?php echo htmlspecialchars($jobData['plantilla_item']); ?></p>
                            </div>

                            <!-- Monthly Salary -->
                            <div class="mb-3">
                                <h5>Monthly Salary</h5>
                                <p><?php echo htmlspecialchars($jobData['monthly_salary']); ?></p>
                            </div>
                        </div>

                        <!-- Second Column: Pay Grade, Qualifications, and Other Information -->
                        <div class="col-md-6">
                            <!-- Pay Grade -->
                            <div class="mb-3">
                                <h5>Pay Grade</h5>
                                <p><?php echo htmlspecialchars($jobData['pay_grade']); ?></p>
                            </div>

                            <!-- Qualifications Section -->
                            <div class="mb-3">
                                <h4>Qualifications</h4>
                                <div class="mb-2">
                                    <h5>Education</h5>
                                    <p><?php echo htmlspecialchars($jobData['education']); ?></p>
                                </div>
                                <div class="mb-2">
                                    <h5>Training</h5>
                                    <p><?php echo htmlspecialchars($jobData['training']); ?></p>
                                </div>
                                <div class="mb-2">
                                    <h5>Experience</h5>
                                    <p><?php echo htmlspecialchars($jobData['experience']); ?></p>
                                </div>
                                <div class="mb-2">
                                    <h5>Eligibility</h5>
                                    <p><?php echo htmlspecialchars($jobData['eligibility']); ?></p>
                                </div>
                                <div class="mb-2">
                                    <h5>Competency</h5>
                                    <p><?php echo htmlspecialchars($jobData['competency']); ?></p>
                                </div>
                            </div>

                            <!-- Other Information -->
                            <div class="mb-3">
                                <h5>Open Position</h5>
                                <p><?php echo htmlspecialchars($jobData['open_position']); ?></p>
                            </div>

                            <div class="mb-3">
                                <h5>Place</h5>
                                <p><?php echo htmlspecialchars($jobData['place']); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Links Section -->
                    <div class="d-flex justify-content-start mt-4">
                        <a href="http://localhost/smarthr/" class="btn btn-warning me-3">Back</a>
                        <a href="http://localhost/smarthr/applicant/apply.php?job_id=<?php echo htmlspecialchars($jobData['job_id']); ?>" class="btn btn-primary">Apply</a>
                    </div>

                </div>
            </div>
        </div>

        <br><br>
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