<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>


    <script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('images/img6.jpg');
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            margin: 50px auto;
            overflow: hidden;
        }

        .search-container {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td:first-child, th:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        td:last-child, th:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        th, td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
            }

            th, td {
                padding: 10px;
            }
        }

        .back-button {
            margin: 20px auto;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="search-container">
        <form method="GET" action="">
            <label for="facility-search">Search Facility:</label>
            <input type="text" id="facility-search" name="facility_search" placeholder="Enter Facility Name">
            <input type="submit" name="search_facility" value="Search Facility">

            <label for="date-from">From Date:</label>
            <input type="date" id="date-from" name="date_from">
            <label for="date-to">To Date:</label>
            <input type="date" id="date-to" name="date_to">
            <input type="submit" name="search_date" value="Search Date">
        </form>
    </div>

    <?php
    $con = mysqli_connect("localhost", "admin", "admin", "miniproject");

    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $search_query = isset($_GET['facility_search']) ? $_GET['facility_search'] : '';
    $date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
    $date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';

    if (isset($_GET['search_facility']) && !empty($search_query)) {
        $sql = "SELECT 
                    b.id AS booking_id,
                    b.user_id,
                    b.facility_id,
                    f.name AS facility_name,
                    c.firstname AS user_name,
                    f.place,
                    f.rate,
                    b.date_from,
                    b.date_created,
                    b.status
                FROM 
                    booking_list b
                JOIN 
                    facility_list f ON b.facility_id = f.facility_id
                JOIN 
                    customer_details c ON b.user_id = c.id
                WHERE
                    f.name LIKE ?";

        $stmt = $con->prepare($sql);
        $search_param = "%$search_query%";
        $stmt->bind_param("s", $search_param);
        $stmt->execute();
        $result = $stmt->get_result();
    } elseif (isset($_GET['search_date']) && !empty($date_from) && !empty($date_to)) {
        $sql = "SELECT 
                    b.id AS booking_id,
                    b.user_id,
                    b.facility_id,
                    f.name AS facility_name,
                    c.firstname AS user_name,
                    f.place,
                    f.rate,
                    b.date_from,
                    b.date_created,
                    b.status
                FROM 
                    booking_list b
                JOIN 
                    facility_list f ON b.facility_id = f.facility_id
                JOIN 
                    customer_details c ON b.user_id = c.id
                WHERE
                    b.date_from BETWEEN ? AND ?";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $date_from, $date_to);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $sql = "SELECT 
                    b.id AS booking_id,
                    b.user_id,
                    b.facility_id,
                    f.name AS facility_name,
                    c.firstname AS user_name,
                    f.place,
                    f.rate,
                    b.date_from,
                    b.date_created,
                    b.status
                FROM 
                    booking_list b
                JOIN 
                    facility_list f ON b.facility_id = f.facility_id
                JOIN 
                    customer_details c ON b.user_id = c.id";

        $result = $con->query($sql);
    }

    $data = array();
    $totalRate = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            $totalRate += $row['rate'];
        }
    }

    $con->close();
    ?>

    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Facility ID</th>
                <th>Facility Name</th>
                <th>User Name</th>
                <th>Place</th>
                <th>Rate</th>
                <th>Date Booked</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($data)) {
                foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>{$row['booking_id']}</td>";
                    echo "<td>{$row['user_id']}</td>";
                    echo "<td>{$row['facility_id']}</td>";
                    echo "<td>{$row['facility_name']}</td>";
                    echo "<td>{$row['user_name']}</td>";
                    echo "<td>{$row['place']}</td>";
                    echo "<td>{$row['rate']}</td>";
                    echo "<td>{$row['date_from']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No bookings available</td></tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"></td>
                <td>Total Rate</td>
                <td style="font-weight: bold; color: #4CAF50;"><?php echo $totalRate; ?></td>
                <td colspan="2"></td>
            </tr>
        </tfoot>
    </table>

    <a href="adminpage.php" class="back-button">Back</a>

</div>

</body>
</html>
