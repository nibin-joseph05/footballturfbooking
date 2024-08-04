<?php
// Start or resume the session
session_start();

// Include the database connection file
$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables
$booking_id = isset($_GET['booking_id']) ? $_GET['booking_id'] : null;
$facilityDetails = null;

// Fetch booking details from the database based on $booking_id
if ($booking_id) {
    // Use a JOIN query to fetch details from both tables
    $query = "SELECT f.*, bl.date_from, bl.user_id, bl.date_created
    FROM facility_list f
    LEFT JOIN booking_list bl ON f.facility_id = bl.facility_id
    WHERE bl.id = '$booking_id'";

    $result = mysqli_query($con, $query);

    // Check for errors
    if (!$result) {
        die("Error: " . mysqli_error($con));
    }

    // Fetch the result as an associative array
    $facilityDetails = mysqli_fetch_assoc($result);

    // Extract facility details from the result
    $facilityName = $facilityDetails['name'];
    $description = $facilityDetails['description'];
    $rateperday = $facilityDetails['rate'];
    $place = $facilityDetails['place'];
    $selectedDate = $facilityDetails['date_from'];

    // Extract user details
    $user_id = $facilityDetails['user_id'];

    // Fetch user details based on user ID
    $queryUser = "SELECT * FROM customer_details WHERE id = '$user_id'";
    $resultUser = mysqli_query($con, $queryUser);

    if ($resultUser) {
        $userDetails = mysqli_fetch_assoc($resultUser);
        $username = $userDetails['firstname'];
    } else {
        $username = "Unknown";  // Provide a default if user details cannot be fetched
    }

    // Use the date_created from the result
    $datecreated = $facilityDetails['date_created'];

    // Check if the payment has been made (you need to implement your payment logic here)
    $paymentCompleted = true;

    // Update the booking_list table with the rate in the amount column
    $updateBookingQuery = "UPDATE booking_list SET amount = '$rateperday' WHERE id = '$booking_id'";
    $resultUpdateBooking = mysqli_query($con, $updateBookingQuery);

    if (!$resultUpdateBooking) {
        die("Error updating booking amount: " . mysqli_error($con));
    }
}

// Close the database connection
mysqli_close($con);
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payment Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(to bottom, #3498db, #2c3e50);
            color: #fff;
        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: 0 auto;
        }

        .facility-details,
        .payment-container {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 48%;
            box-sizing: border-box;
            text-align: center;
            margin-right: 15px;
        }

        h2 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
        }

        .facility-details input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            width: calc(100% - 20px);
        }

        .facility-details input[type="date"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            width: calc(100% - 20px);
        }

        .facility-details label {
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            display: block;
        }

        .payment-container h1 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .payment-container label,
        .payment-container input {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            color: #333;
        }

        .payment-button {
            padding: 12px;
            font-size: 14px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        .payment-button:hover {
            background-color: #2980b9;
        }

        .icon {
            margin-right: 8px;
            font-size: 18px;
        }

        .payment-method-icons {
            display: flex;
            justify-content: space-around;
            margin-bottom: 15px;
        }

        .payment-method-icons i {
            font-size: 24px;
            color: #fff;
            background-color: #3498db;
            padding: 8px;
            border-radius: 50%;
            margin: 0 5px;
        }
        #submit {
    padding: 15px;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #27ae60;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease-in-out;
}

#submit:hover {
    background-color: #219653;
}
    </style>
</head>

<body>




    <div class="container">
   
        <!-- Facility Details -->
        <div class="facility-details">
            <h2>Facility Details</h2>
            <label for="first-name"><i class="fas fa-futbol icon"></i> Name Of The Turf</label>
            <input type="text" id="first-name" name="t1" value="<?php echo isset($facilityDetails['name']) ? $facilityDetails['name'] : ''; ?>" readonly>

            <label for="last-name"><i class="fas fa-info-circle icon"></i> Description</label>
            <input type="text" id="last-name" name="t2" value="<?php echo isset($facilityDetails['description']) ? $facilityDetails['description'] : ''; ?>" readonly>

            <label for="contact"><i class="fas fa-dollar-sign icon"></i> Rate Per Day</label>
            <input type="tel" id="contact" name="t3" value="<?php echo isset($facilityDetails['rate']) ? $facilityDetails['rate'] : ''; ?>" readonly>

            <label for="place"><i class="fas fa-map-marker-alt icon"></i> Place</label>
            <input type="text" id="place" name="t5" value="<?php echo isset($facilityDetails['place']) ? $facilityDetails['place'] : ''; ?>" readonly>

            <label for="date-booked"><i class="fas fa-calendar-alt icon"></i> Date Booked:</label>
            <input type="text" id="date-booked" name="date-booked" value="<?php echo isset($facilityDetails['date_from']) ? $facilityDetails['date_from'] : ''; ?>" readonly>
        
            <!-- Inside the facility-details div -->
<label for="username"><i class="fas fa-user icon"></i> Username:</label>
<input type="text" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>" readonly>

<label for="booking-date"><i class="fas fa-calendar-alt icon"></i> Booking Date:</label>
<input type="text" id="booking-date" name="booking-date" value="<?php echo isset($facilityDetails['date_created']) ? $facilityDetails['date_created'] : ''; ?>" readonly>


        </div>

        
        <div class="payment-container">
        <h1>Pay now to book Turf</h1>


        <form method="post" action="">
    <div id="card-details" style="width: 100%;">
    <label for="card-number"><i class="fas fa-credit-card icon"></i> Card Number:</label>
<input type="text" id="card-number" name="card-number" placeholder="**** **** **** ****">

<label for="expiry-date"><i class="fas fa-calendar-alt icon"></i> Expiry Date:</label>
<input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YYYY">

<label for="cvv"><i class="fas fa-lock icon"></i> CVV:</label>
<input type="text" id="cvv" name="cvv" placeholder="***">
    </div>

   
   
            <!-- Add hidden inputs for facility_id and booking_id -->
            <input type="hidden" name="facility_id" value="<?php echo $facility_id; ?>">
            <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
            <button type="submit" name="submit" id="submit">Book Date</button>
</form>

<script>
    document.getElementById('submit').addEventListener('click', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Optionally, you can submit the form data to the server using AJAX
        // and handle the redirection in the server-side script.
        // Example:
        // var formData = new FormData(document.getElementById('payment-form'));
        // fetch('your_processing_script.php', {
        //     method: 'POST',
        //     body: formData
        // })
        // .then(response => response.json())
        // .then(data => {
        //     if (data.success) {
        //         // Redirect to booking.php after payment is done
        //         window.location.href = 'booking.php';
        //     } else {
        //         console.error('Error processing the form');
        //     }
        // })
        // .catch(error => {
        //     console.error('Error:', error);
        // });

        // Redirect to booking.php after payment is done
        window.location.href = 'booking.php';
    });
</script>

<div>

<div class="payment-method-icons">
    <i class="fab fa-cc-mastercard"></i>
    <i class="fab fa-cc-visa"></i>
    <i class="fab fa-cc-amex"></i>
    <i class="fab fa-cc-discover"></i>
    <i class="fab fa-phone"></i>
    <i class="fab fa-google-pay"></i>
    <i class="fab fa-paypal"></i>
    <i class="fab fa-paytm"></i>
</div>

</div>
<h1>DISCLAIMER: THE BOOKING CAN BE CANCELLED WITHIN 7 DAYS AND THE MONEY WILL BE CREDITED SHORTLY<h1>
</div>
        
    

   

</body>

</html>
