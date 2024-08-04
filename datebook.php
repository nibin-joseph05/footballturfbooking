<?php

$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}


session_start();


$facility_id = isset($_GET['facility_id']) ? $_GET['facility_id'] : null;
$selectedDate = null;
$facilityName = null;


if ($facility_id) {
    $bookingQuery = mysqli_query($con, "SELECT f.name AS facility_name FROM facility_list f WHERE f.facility_id = '$facility_id'");
    $bookingData = mysqli_fetch_assoc($bookingQuery);


    $facilityName = $bookingData['facility_name'];
}

// Assuming you have already validated and sanitized the inputs
if (isset($_POST['submit'])) {
    $selectedDate = $_POST['date_from'];
    $userID = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    if (!$userID) {
        // Handle the case where user ID is not available in the session
        echo "<script>alert('User ID not found. Please log in.'); window.location.href = 'login.php';</script>";
        exit();
    }

    // Check if the selected date already exists for the specific facility in the database
    $checkQuery = mysqli_query($con, "SELECT * FROM booking_list WHERE date_from = '$selectedDate' AND facility_id = '$facility_id'");
    $count = mysqli_num_rows($checkQuery);

    if ($count > 0) {
        echo "<script>alert('Date is already booked for this facility. Please select another date.');</script>";
    } else {
        // Insert the booking details with user ID into the database
        $insertQuery = mysqli_query($con, "INSERT INTO booking_list (date_from, facility_id, user_id) 
                                           VALUES ('$selectedDate', '$facility_id', '$userID')");

        // Debugging
        echo "Insert Query Result: " . ($insertQuery ? "Success" : "Failure") . "<br>";

        if ($insertQuery) {
            // Get the booking ID
            $bookingID = mysqli_insert_id($con);

            // Redirect to the payment page with booking_id and facility_id parameters
            header("Location: payment.php?facility_id=$facility_id&booking_id=$bookingID");
            exit();
        } else {
            // Output MySQL error if any
            echo "MySQL Error: " . mysqli_error($con) . "<br>";
            echo "<script>alert('Error booking date.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>

   
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('img/fb.jpg'); /* Optional background image */
            background-size: cover;
            margin: 0;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .booking-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
            text-align: center;
        }

        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .button {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border-radius: 5px;
    display: inline-block;
}
    </style>
</head>

<body>
    <div class="booking-container">
        <h1>Booking Details</h1>

        <!-- Display the details of the selected facility -->
        <label for="selectedFacility">Selected Facility:</label>
        <input type="text" id="selectedFacility" name="selectedFacility" value="<?php echo $facilityName; ?>" readonly>

        <form method="post">
            <!-- Add hidden inputs for facility_id and date_from -->
            <input type="hidden" name="facility_id" value="<?php echo $facility_id; ?>">
            <input type="hidden" name="date_from" value="<?php echo $selectedDate; ?>">

            <label for="fromDate">From Date:</label>
            <input type="date" id="fromDate" name="date_from" required>

            <!-- Use an input type submit to submit the form -->
            <input type="submit" name="submit" value="Book Now" class="book-now-button">
        </form>




        <a href="userpage.php" class="button">Back to Home</a>
    </div>
</body>

</html>
