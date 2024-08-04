<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registerstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Update Profile</title>
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

<?php
// Start or resume the session
session_start();

// Check if the session variable containing user ID is set
if (isset($_SESSION['id'])) {
    // Fetch the user ID from the session
    $userId = $_SESSION['id'];

    // Connect to the database
    $con = mysqli_connect("localhost", "admin", "admin", "miniproject");

    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Fetch user details based on user ID
    $userData = mysqli_query($con, "SELECT * FROM customer_details WHERE id='$userId'");
    $userDetails = ($userData) ? mysqli_fetch_array($userData) : [];
}

if (isset($_POST['submit'])) {
    // Update the customer_details table
    $mt1 = $_POST['fname'];
    $mt2 = $_POST['mname'];
    $mt3 = $_POST['lname'];
    $mt4 = $_POST['address'];
    $mt5 = $_POST['contact'];
    $mt6 = $_POST['email'];
    $mt7 = $_POST['gender'];
    $mt8 = $_POST['password']; 
    $mt9 = $_POST['confirm_password'];

    // Check if a new photo is uploaded
    $updatePhoto = '';
    if (!empty($_FILES['photo']['name'])) {
        move_uploaded_file($_FILES['photo']["tmp_name"], "img/" . $_FILES['photo']["name"]);
        $photo = "img/" . $_FILES['photo']["name"];
        $updatePhoto = ", image_path = '$photo'";
    }

    $updateQuery = "UPDATE customer_details SET 
                    firstname = '$mt1',
                    middlename = '$mt2',
                    lastname = '$mt3',
                    address = '$mt4',
                    contact = '$mt5',
                    email = '$mt6',
                    gender = '$mt7',
                    password = '$mt8',
                    confirm_password = '$mt9'
                    $updatePhoto
                    WHERE id = '$userId'";

    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        echo "<script>alert('Profile updated successfully');</script>";
        header('location: userpage.php');
        exit;
    } else {
        echo "<script>alert('Error updating profile: " . mysqli_error($con) . "');</script>";
    }
}
?>
<!-- Your HTML form goes here -->


<div class="signup-container">
    <div class="signup-form">
        <h1>Update Profile</h1>
        <form method="post" enctype="multipart/form-data">
            <!-- Add the left side of the form -->
            <div class="left-side">
                <div class="form-group">
                    <label for="first-name"><i class="fas fa-user"></i> First Name</label>
                    <input type="text" id="first-name" name="fname" value="<?php echo isset($userDetails['firstname']) ? htmlspecialchars($userDetails['firstname']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="last-name"><i class="fas fa-user"></i> Last Name</label>
                    <input type="text" id="last-name" name="lname" value="<?php echo isset($userDetails['lastname']) ? htmlspecialchars($userDetails['lastname']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="contact"><i class="fas fa-phone"></i> Contact</label>
                    <input type="tel" id="contact" name="contact" value="<?php echo isset($userDetails['contact']) ? htmlspecialchars($userDetails['contact']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($userDetails['email']) ? htmlspecialchars($userDetails['email']) : ''; ?>" required>
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
                    <input type="text" id="middle-name" name="mname" value="<?php echo isset($userDetails['middlename']) ? htmlspecialchars($userDetails['middlename']) : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="address"><i class="fas fa-map-marker-alt"></i> Address</label>
                    <input type="text" id="address" name="address" value="<?php echo isset($userDetails['address']) ? htmlspecialchars($userDetails['address']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender"><i class="fas fa-venus-mars"></i> Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="male" <?php echo isset($userDetails['gender']) && $userDetails['gender'] === 'male' ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo isset($userDetails['gender']) && $userDetails['gender'] === 'female' ? 'selected' : ''; ?>>Female</option>
                        <option value="other" <?php echo isset($userDetails['gender']) && $userDetails['gender'] === 'other' ? 'selected' : ''; ?>>Other</option>
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
            <button type="submit" name="submit">Update Details</button>
        </form>
        <p class="link-text">
            <a href="userpage.php"><i class="fas fa-home"></i> Back to Home</a>
        </p>
    </div>
</div>

</body>
</html>
