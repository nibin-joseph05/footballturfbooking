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
    <title>User Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(to bottom, #3498db, #2c3e50);
            background-repeat: no-repeat;
            background-size: cover;
            color: #fff;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #000;
            color: #fff;
            border-radius: 5px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td:first-child, th:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        td:last-child, th:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        @media (max-width: 768px) {
            th, td {
                padding: 10px;
            }
        }

        .back-button {
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

        .back-button:hover {
            background-color: #45a049;
        }
        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #000; /* Change background color to black */
    color: #fff; /* Change text color to white */
    border-radius: 5px;
    overflow: hidden;
}
.back-button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
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

    <?php
    $con = mysqli_connect("localhost", "admin", "admin", "miniproject");

    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM customer_details";
    $result = $con->query($sql);

    $userData = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userData[] = $row;
        }
    }

    $con->close();
    ?>

    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($userData as $user) {
                echo "<tr>";
                echo "<td>{$user['id']}</td>";
                echo "<td>{$user['firstname']}</td>";
                echo "<td>{$user['lastname']}</td>";
                echo "<td>{$user['gender']}</td>";
                echo "<td>{$user['contact']}</td>";
                echo "<td>{$user['address']}</td>";
                echo "<td>{$user['email']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="adminpage.php" class="back-button">Back to Home</a>

</div>

</body>
</html>
