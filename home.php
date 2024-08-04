<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MINI-PROJECT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description"> 

    <!-- Favicon -->
    <link href="home/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="home/lib/animate/animate.min.css" rel="stylesheet">
    <link href="home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="home/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="home/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="home/css/style.css" rel="stylesheet">
</head>




<script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
               
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href="adminpage.php"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="home.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0">MINI-PROJECT</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="home.php" class="nav-item nav-link active">Home</a>
                <a href="login.php" class="nav-item nav-link active">Book Now</a>
                <a href="login.php" class="nav-item nav-link">My Account</a>
                <a href="login.php" class="nav-item nav-link">my bookings</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="displayfeedback.php" class="nav-item nav-link">Customer FeedBack</a>
                <a href="login.php" class="nav-item nav-link">Login/SignUp</a>
               
            </div>
        </div>
            
        </div>
    </nav>
    <!-- Navbar End -->


 <!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/fb.jpg" alt="Image" style="max-width: 100%; max-height: 600px; height: auto;">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h1 class="display-4 text-white mb-4 animated slideInDown">BOOK TURFS IN YOUR LOCALITY!</h1>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/fb1.jpg" alt="Image" style="max-width: 100%; max-height: 600px; height: auto;">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-4 text-white mb-4 animated slideInDown">TAKE A BREAK FROM ONLINE GAMES</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/fb2.jpg" alt="Image" style="max-width: 100%; max-height: 600px; height: auto;">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-4 text-white mb-4 animated slideInDown">PLAY WITH YOUR TEAMMATES!</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->





<!-- Top Feature Start -->
<div class="container-fluid top-feature py-5">
    <div class="container py-5">
        <div class="row gx-4">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-card bg-primary text-light rounded p-4">
                    <i class="fas fa-futbol fa-3x mb-3"></i>
                    <h4>Book Your Turf</h4>
                    <p>Quick and easy booking process for football turf.</p>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature-card bg-primary text-light rounded p-4">
                    <i class="fas fa-calendar-alt fa-3x mb-3"></i>
                    <h4>Choose Date & Time</h4>
                    <p>Select your preferred date and time slot.</p>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature-card bg-primary text-light rounded p-4">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h4>Play with Friends</h4>
                    <p>Invite friends to join your turf booking.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Feature End -->



    
    

    
   

   <center><h1>Welcome</h1></center>

    <h2>Introduction</h2>
    <p>
        Artificial turf is a surface of synthetic fibers made to look like natural grass, used in sports arenas, residential lawns, and commercial applications that traditionally use grass. It is much more durable than grass and easily maintained without irrigation or trimming, although periodic cleaning is required. Stadiums that are substantially covered and/or at high latitudes often use artificial turf, as they typically lack enough sunlight for photosynthesis and substitutes for solar radiation are prohibitively expensive and energy-intensive.
    </p>

    <h2>Advantages</h2>
    <ol type="1">
        <li>All-weather</li>
        <li>Maintenance free</li>
        <li>Long lasting</li>
        <li>Save money</li>
        <li>All year round green</li>
    </ol>

    <h3>1. All-weather</h3>
    <p>
        Actually, if it snows, this point can be challenged, but basically, the turf can be used in pretty much any weather. For example, in sports, the weather will not delay players from using the turf.
    </p>

    <h3>2. Maintenance free</h3>
    <p>
        A better description would be Easy or Less Maintenance, as cleaning, grooming, and general care are still needed. To be exact, less maintenance is one of the key benefits of artificial grass.
    </p>

    <h3>3. Long lasting</h3>
    <p>
        The main raw material of most artificial turf is polyethylene. Polyethylene products are not only soft and natural but also have good wear resistance. For sports clubs, artificial sports pitches cannot be more suitable for daily intense training.
    </p>

    <h3>4. Save money</h3>
    <p>
        Commercially synthetic turf pitches are proven to be a lifeline for schools and clubs when the income from external bookings is considered. In addition, most surfaces can be catered for multiple sports pitches to host more than one sport; for example, football and rugby go very well together.
    </p>

    <h3>5. All year round green</h3>
    <p>
        Grass and sod will go into a dormant stage in the winter and turn brown and unsightly. Synthetic turf maintains the same color year-round, no matter what season, it can bring you a charming oasis. Choose artificial grass with UV protection so that even if you install it in a place where the sun is strong, it won't fade or discolor and will maintain its vibrant green color. For the equatorial zones, sunny latitudes, or thin air areas, this point is really a decisive benefit of artificial grass.
    </p>


   

   

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Team</p>
                <h1 class="display-5 mb-5">Dedicated & Experienced Team Members</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/kuttu.jpg" alt=""height="1000">
                        <div class="team-text">
                            <h4 class="mb-0">ALLWIN E</h4>
                            <p class="text-primary">WEB DESIGNER</p>
                            <div class="team-social d-flex">
                               
                                <a class="btn btn-square rounded-circle me-2" href="https://instagram.com/__turbonoticz__?igshid=NzZlODBkYWE4Ng=="><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/aboo.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Aboo Thahir</h4>
                            <p class="text-primary"> Designer</p>
                            <div class="team-social d-flex">
                                
                               
                                <a class="btn btn-square rounded-circle me-2" href="https://instagram.com/__.badhu.__?igshid=NzZlODBkYWE4Ng=="><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/cyril.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Cyril</h4>
                            <p class="text-primary">Developer</p>
                            <div class="team-social d-flex">
                                
                                <a class="btn btn-square rounded-circle me-2" href="https://instagram.com/space_rider_102?igshid=NzZlODBkYWE4Ng=="><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


   


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>St.Antony's College,Peruvanthanam</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>SACS6BCA@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Services</h4>
                    <a class="btn btn-link" href="">24/7 Customer Support</a>
                    <a class="btn btn-link" href="">Medical Help</a>
                    <a class="btn btn-link" href="">Restaurent</a>
                    <a class="btn btn-link" href="">Clean ANd Green</a>
                    <a class="btn btn-link" href="">Washroom Facility</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="about.php">About Us</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                    <a class="btn btn-link" href="login.php">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
              
            </div>
        </div>
    </div>
    <!-- Footer End -->


   


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="home/lib/wow/wow.min.js"></script>
    <script src="home/lib/easing/easing.min.js"></script>
    <script src="home/lib/waypoints/waypoints.min.js"></script>
    <script src="home/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="home/lib/counterup/counterup.min.js"></script>
    <script src="home/lib/parallax/parallax.min.js"></script>
    <script src="home/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="home/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="home/js/main.js"></script>
</body>

</html>