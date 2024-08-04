

<?php
session_start();

// Include the database connection file
require_once 'connection.php';

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Retrieve user details from the database
    $sql = "SELECT firstname, email, contact FROM customer_details WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user details are retrieved
    if ($user) {
        $username = $user['firstname'];
        $userEmail = $user['email'];
        $userContact = $user['contact'];
    } else {
        $username = 'Guest';
        $userEmail = ''; // Set a default value or leave it empty
        $userContact = ''; // Set a default value or leave it empty
    }
}
?>

<!DOCTYPE html>
<html>


<script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="home/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="home/css/style.css" rel="stylesheet">
    
</head>
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
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <span><?php echo $userContact; ?></span>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <span class="far fa-envelope me-2"></span>
                    <span><?php echo $userEmail; ?></span>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
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
    <a href="uabout.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <h1>Welcome
    <span>, <?php echo $username; ?></span></h1>
</a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="userpage.php" class="nav-item nav-link active">Home</a>
                <a href="booking.php" class="nav-item nav-link active">Book Now</a>
                <a href="userdetails.php" class="nav-item nav-link">My Account</a>
                <a href="userbookings.php" class="nav-item nav-link">my bookings</a>
                <a href="ucontact.php" class="nav-item nav-link">Contact</a>
                <a href="uabout.php" class="nav-item nav-link">About</a>
                <a href="feedback.php" class="nav-item nav-link">Add FeedBack</a>
                <a href="logout.php" class="nav-item nav-link">Log Out</a>
            </div>
        </div>
            
        </div>
    </nav>
    <!-- Navbar End -->
   
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



    <div style="text-align: center;">
    <h1 style="color: black; font-size: 40px;"><u>About Us</u></h1>
    
    <p style="font-size: 20px; margin: 20px 0; line-height: 1.5;"><strong>A belief to create a playground where you can fit in with other fellow misfits, where access is not limited by narrow membership walls.</strong></p>
    <p style="font-size: 20px; margin: 20px 0; line-height: 1.5;"><strong>A belief that you can play when you want, where you want, how you want, and not have to suffer the agony of wait.</strong></p>
    <p style="font-size: 20px; margin: 20px 0; line-height: 1.5;"><strong>A belief to create a world where you can lose yourself and yet rediscover yourself, where you can be both the victor and the vanquished and laugh at being both.</strong></p>
    <p style="font-size: 20px; margin: 20px 0; line-height: 1.5;"><strong>A belief that happiness is a dish best served on the field.</strong></p>
    <p style="font-size: 20px; margin: 20px 0; line-height: 1.5;"><strong>We warmly welcome you to Playo, your singular destination for sports, fitness, fun, and all things recreational. Come, relive those cherished childhood moments when you exchanged high fives or wept as one for a loss. Time to get your lovable varsity jersey out and give your neighbor a shout or go challenge your colleague...better still make a new friend. Get Addicted to Play...and create your own happily ever after!</strong></p>


    <h2 style="font-size: 30px;">Who Are We:</h2>
    <p style="font-size: 20px; margin: 20px 0; line-height: 1.5;"><strong>It's for a mini project, it's been created by four members: they are,</strong></p>
    
    <div class="centerdiv">
        <a href="https://instagram.com/_.n_.i_.b_.i_.n?igshid=NzZlODBkYWE4Ng==" target="_blank">
            Nibin Joseph
            <i class="fab fa-instagram fa-4x" style="color: #E4405F; display: block; margin: 0 auto;"></i>
        </a>
        <br>
        <br>
        <a href="https://instagram.com/__turbonoticz__?igshid=NzZlODBkYWE4Ng==" target="_blank">
            Allwin Tokyo
            <i class="fab fa-instagram fa-4x" style="color: #E4405F; display: block; margin: 0 auto;"></i>
        </a>
        <br>
        <br>
        <a href="https://instagram.com/space_rider_102?igshid=NzZlODBkYWE4Ng==" target="_blank">
            Cyril Mathew
            <i class="fab fa-instagram fa-4x" style="color: #E4405F; display: block; margin: 0 auto;"></i>
        </a>
        <br>
        <br>
        <a href="https://instagram.com/__.badhu.__?igshid=NzZlODBkYWE4Ng==" target="_blank">
            Aboo Thahir
            <i class="fab fa-instagram fa-4x" style="color: #E4405F; display: block; margin: 0 auto;"></i>
        </a>
    </div>

    <h2 style="font-size: 30px;">What We Believe In:</h2>
    <p style="font-size: 20px; margin: 20px 0; line-height: 1.5;"><strong>We believe in the motto: "Live to Sport" because let's accept it, playing sports is pretty awesome. Plus it makes you feel awesome.</strong></p>

    <h2 style="font-size: 30px;">Our Vision & Mission:</h2>
    <p style="font-size: 20px; margin: 20px 0; line-height: 1.5;"><strong>Our Vision is to promote every sport in INDIA and convert Sports from being a Hobby to a Habit in our lives. Our Mission is to become the "ONE SPOT FOR EVERYTHING SPORT."</strong></p>
</div>

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
                    <a class="btn btn-link" href="booking.php">Our Services</a>
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
