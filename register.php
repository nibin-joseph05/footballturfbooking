<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registerstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>register</title>
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

$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}




if(isset($_POST['submit']))
{
	$mt1=$_POST['fname'];
	$mt2=$_POST['mname'];
	$mt3=$_POST['lname'];
    $mt4=$_POST['address']; 
	$mt5=$_POST['contact'];
	$mt6=$_POST['email'];
    $mt7=$_POST['gender'];
	$mt8=$_POST['password'];
	$mt9=$_POST['confirm_password'];

	move_uploaded_file($_FILES['photo']["tmp_name"],"img/".$_FILES['photo']["name"]);
	$photo="img/".$_FILES['photo']["name"];
	$n=mysqli_query($con,"insert into customer_details(firstname,middlename,lastname,address,contact,email,gender,password,confirm_password,image_path) values('$mt1','$mt2','$mt3','$mt4','$mt5','$mt6','$mt7','$mt8','$mt9','$photo')");


	if($n>0)
	{
		echo "<script> alert('connected successfully');</script>";
        header('location: login.php');
	}
    
}



?>
<body>
    <div class="signup-container">
        <div class="signup-form">
            <h1>Sign Up</h1>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <!-- Add the left side of the form -->
                <div class="left-side">
                    <div class="form-group">
                        <label for="first-name"><i class="fas fa-user"></i> First Name</label>
                        <input type="text" id="first-name" name="fname" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name"><i class="fas fa-user"></i> Last Name</label>
                        <input type="text" id="last-name" name="lname" required>
                    </div>
                    <div class="form-group">
                        <label for="contact"><i class="fas fa-phone"></i> Contact</label>
                        <input type="tel" id="contact" name="contact" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="avatar"><i class="fas fa-image"></i> Upload photo</label>
                        <input type="file" id="avatar" name="photo" accept="image/*">
                    </div>
                    
                </div>
                <!-- Add the right side of the form -->
                <div class="right-side">
                <div class="form-group">
                        <label for="middle-name"><i class="fas fa-user"></i> Middle Name</label>
                        <input type="text" id="middle-name" name="mname">
                    </div>
                    <div class="form-group">
                        <label for="address"><i class="fas fa-map-marker-alt"></i> Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="gender"><i class="fas fa-venus-mars"></i> Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password"><i class="fas fa-lock"></i> Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm_password" required>
                    </div>
                    
                </div>
                <!-- End of the right side -->
                <div class="clearfix"></div>
                <button type="submit"name="submit">Sign Up</button>
            </form>
            <p class="link-text">
                already have an account?<a href="login.php"><i class="fas fa-sign-in-alt"></i> log In</a> | <a href="home.php"><i class="fas fa-home"></i> Back to Home</a>
            </p>
        </div>
    </div>
</body>
</html>
