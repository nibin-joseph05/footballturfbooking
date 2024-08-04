
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
<html lang="en">
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
    <a href="ucontact.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <h1>Welcome
    <span>, <?php echo $username; ?></span></h1>
</a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
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



<header style="background-color: green; color: red; text-align: center; padding: 20px;">
        <h1>Contact List</h1>
    </header>
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
        <table style="width: 100%; border-collapse: collapse;">
            <tr style="background-color: #333; color: #fff;">
                <th style="padding: 10px; text-align: left;">No</th>
                <th style="padding: 10px; text-align: left;">Name</th>
                <th style="padding: 10px; text-align: left;">Email</th>
                <th style="padding: 10px; text-align: left;">Phone Number</th>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">1</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">Nibin</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">nibinjoseph2019@gmail.com</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">+919778234876</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">2</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">Allwin</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">allwin0368@gmail.com</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">+917306164387</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">3</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">Cyril</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">cyril@gmail.com</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">+918590571092</td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">4</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">Aboo</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">aboothahir456@gmail.com</td>
                <td style="border: 1px solid #ccc; padding: 10px; text-align: left;">+919526817951</td>
            </tr>
        </table>
    </div>
    <footer style="background-color: green; color: #fff; text-align: center; padding: 10px;">
        <p>Contact us at sacs6bca@gmail.com</p>
    </footer>



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




    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


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