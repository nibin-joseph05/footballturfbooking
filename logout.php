<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page as needed
    header("Location: login.php"); // Change "login.php" to the appropriate URL
    exit();
} else {
    // If the user is not logged in, simply redirect to the login page
    header("Location: login.php"); // Change "login.php" to the appropriate URL
    exit();
}
?>
