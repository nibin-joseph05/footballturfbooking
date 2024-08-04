<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title> Login</title>
</head>



<script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>

<?php 
session_start();


$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}


if (isset($_POST['submit'])) {
    $mt1 = $_POST['email'];
    $mt2 = $_POST['password'];

    $data = mysqli_query($con, "SELECT * FROM customer_details WHERE email='$mt1' AND password='$mt2'");
    $rs = mysqli_fetch_array($data);

    if (empty($rs['email'])) {
        echo "<script> alert('no user found in the given email');</script>";
    } else {
        $id = $rs['id'];
        $r = $rs['status'];
        $n = $rs['name'];
        $_SESSION['id'] = $id; 
        $_SESSION['uname'] = $mt1; // Use $mt1 for the email
        $_SESSION['pword'] = $mt2; // Use $mt2 for the password
        $_SESSION['name'] = $n;
        $_SESSION['rights'] = $r;
		
        if ($r == "admin") {
            header('location: adminpage.php');
        } else {
            header('location: userpage.php');
        }
    }
}
?>

<body>
    <div class="login-container">
        <div class="login-form">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i>Email/Username</label>
                    <input type="text" id="email" name="email" placeholder="enter your email here.."required>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" id="password" name="password"required>
                </div>
                <button type="submit"name="submit">Login</button>
            </form>
            <p class="link-text">
              new user?<a href="register.php"><i class="fas fa-user-plus"></i> Sign Up</a> | <a href="home.php"><i class="fas fa-home"></i> Back to Home</a>
            </p>
        </div>
    </div>
</body>
</html>
