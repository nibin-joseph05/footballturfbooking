<?php
// Establish a database connection
$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

// Check if 'facility_id' is set in the URL
if (isset($_GET['facility_id'])) {
    $r = $_GET['facility_id'];
    echo "Facility ID: " . $r; // Add this line for debugging

    // Perform deletion query
    $n = mysqli_query($con, "DELETE FROM facility_list WHERE facility_id ='$r'");

    // Check for errors
    if (!$n) {
        die("Deletion failed: " . mysqli_error($con));
    }

    // Redirect
    header('location: facility_list.php');
} else {
    // If 'facility_id' is not set in the URL, handle accordingly
    echo "Facility ID is not set in the URL";
}

// Close the database connection
mysqli_close($con);
?>
