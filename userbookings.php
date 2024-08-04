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
    <title>My Bookings</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('images/img6.jpg'); 
            background-size: cover;
            background-position: center;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-top: 50px;
        }

        table {
            width: 90%; 
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            opacity: 0.9;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        td {
            background-color: #f2f2f2;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 5px;
        }

       
        .back-to-home-button {
            margin-top: 20px;
            text-align: center;
        }

        .back-to-home-button a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #4CAF50; 
            color: #fff; 
            border-radius: 5px;
            transition: background-color 0.3s; 
        }

        .back-to-home-button a:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>
<?php
session_start();

$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    
    $query = "SELECT bl.*, cd.*, fl.*, bl.date_created AS booking_date_created ,bl.id AS booking_id
    FROM booking_list bl 
    JOIN customer_details cd ON bl.user_id = cd.id 
    JOIN facility_list fl ON bl.facility_id = fl.facility_id 
    WHERE bl.user_id = $userId";

    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
           
            echo '<h1>My Bookings</h1>';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>User Name</th>';
            echo '<th>Facility Booked</th>';
            echo '<th>Booked Date</th>';
            echo '<th>Date</th>';
            echo '<th>Amount</th>';
            echo '<th>Action</th>'; 
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
           
            while ($row = mysqli_fetch_assoc($result)) { 
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['firstname']) . '</td>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['date_from']) . '</td>';
                echo '<td>' . htmlspecialchars($row['booking_date_created']) . '</td>';
                echo '<td>' . htmlspecialchars($row['amount']) . '</td>';
               
                echo '<td>';
 
                echo "<a href='#' onclick='confirmCancellation(" . $row['booking_id'] . ")'>";
                echo '<button type="button">Cancel Booking</button>';
                echo "</a>";


                echo '<script>';

                echo 'function confirmCancellation(bookingId) {';
                echo '    var confirmCancel = confirm("Your fund will be returned shortly");';
                echo '    if (confirmCancel) {';
                echo '        window.location.href = "http://localhost/miniproject/deletedate.php?booking_id=" + bookingId;';
                echo '    }';
                echo '}';
                echo '</script>';


                
                echo "</a>";


                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            
           
            echo '<div class="back-to-home-button">';
            echo '<a href="http://localhost/miniproject/userpage.php">Back to Home</a>';
            echo '</div>';
        } else {
            echo "No results found.";
        }
    } else {
        echo "Query failed: " . mysqli_error($con);
    }
} else {
    echo "User ID not found in session.";
}


mysqli_close($con);
?>
</body>
</html>