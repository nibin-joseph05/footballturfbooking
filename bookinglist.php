<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('images/turf4.jpg') center/cover no-repeat fixed;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            font-size: 14px;
        }

        th:last-child, td:last-child {
            border-right: none;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        .cancel-confirm {
            display: flex;
            align-items: center;
        }

        .cancel-confirm span {
            padding: 8px;
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 8px;
        }

        .status-pending {
            background-color: #f39c12;
            color: #fff;
        }

        .status-confirmed {
            background-color: #2ecc71;
            color: #fff;
        }

        .status-cancelled {
            background-color: #e74c3c;
            color: #fff;
        }

        .action-buttons button {
            padding: 8px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            margin-right: 5px;
        }

        .action-buttons button.cancel {
            background-color: #e74c3c;
            color: white;
        }

        .action-buttons button.confirm {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
<script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>

<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date Booked</th>
                <th>Turf Name</th>
                <th>Username</th>
                <th>Status</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
          $con = mysqli_connect("localhost", "admin", "admin", "miniproject");

          if (mysqli_connect_errno()) {
              die("Database connection failed: " . mysqli_connect_error());
          }

            $query = "SELECT booking_list.id, booking_list.date_from, facility_list.name, customer_details.email, booking_list.status, booking_list.payment_status
                      FROM booking_list
                      INNER JOIN facility_list ON booking_list.facility_id = facility_list.facility_id
                      INNER JOIN customer_details ON booking_list.user_id = customer_details.id";

            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['date_from'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";

                    echo "<td class='cancel-confirm'>";
                    if ($row['status'] == 'Pending') {
                        echo "<span class='status-pending'>" . $row['status'] . "</span>";
                    } elseif ($row['status'] == 'Confirmed') {
                        echo "<span class='status-confirmed'>" . $row['status'] . "</span>";
                    } elseif ($row['status'] == 'Cancelled') {
                        echo "<span class='status-cancelled'>" . $row['status'] . "</span>";
                    }
                    echo "</td>";

                    echo "<td>" . $row['payment_status'] . "</td>";

                    echo "<td class='action-buttons'>";
                    if ($row['status'] == 'Pending') {
                        echo "<button class='cancel'>Cancel</button>";
                        echo "<button class='confirm'>Confirm</button>";
                    } elseif ($row['status'] == 'Confirmed') {
                        echo "<button class='cancel'>Cancel</button>";
                    }
                    echo "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }

            mysqli_close($con);
            ?>
        </tbody>
    </table>

</body>
</html>
