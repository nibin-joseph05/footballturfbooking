<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Available Facilities</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Your existing styles and scripts go here -->
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: url('images/img1.jpg') center/cover no-repeat fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #808080;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center the content horizontally */
            justify-content: center; /* Center the content vertically */
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #808080;
            color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .active, .pending {
            font-weight: bold;
        }

        .active {
            color: green;
        }

        .pending {
            color: orange;
        }

        .action {
            text-align: center;
        }

        button {
            padding: 6px 12px;
            margin: 2px;
            cursor: pointer;
        }

        button.edit {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
        }

        button.delete {
            background-color: #dc3545;
            color: #fff;
            border: 1px solid #dc3545;
        }

        .create-new {
            text-align: center;
            margin-top: 20px;
        }

        .create-new a {
            text-decoration: none;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>

    <!-- Include your CSS and JS links here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha20/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
        var _base_url_ = 'http://localhost/miniproject/';
    </script>
    <script src="http://localhost/miniproject/script.js"></script>
    <!-- Add other scripts -->
</head>
<script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>


<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">

    <div class="container">
        <h2>Football Turfs</h2>

        <table>
            <tr>
                <th>#</th>
                <th>Date Created</th>
                <th>Name of the Turf</th>
                <th>Place</th>
                <th>About the Turf</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
<!-- ... Previous HTML code ... -->

<?php
 // Include the database connection file (connection.php)
 $con = mysqli_connect("localhost", "admin", "admin", "miniproject");

 if (mysqli_connect_errno()) {
     die("Database connection failed: " . mysqli_connect_error());
 }

 // Fetch data from the facility_list table
 $result = mysqli_query($con, "SELECT * FROM facility_list");

 // Check if the query was successful
 if ($result) {
     $counter = 1;
     // Fetch data row by row
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $counter++ . "</td>";
    echo "<td>" . $row['date_created'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['place'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td class='status'>" . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</td>";
    echo "<td class='action'>";

    // Edit button with a link to facilityedit.php and passing facility ID as a parameter
    echo "<a href='http://localhost/miniproject/facilityedit.php?facility_id=" . $row['facility_id'] . "'>";
    echo "<button>Edit</button>";
    echo "</a>";

    // Delete button with a link to facilitydelete.php and passing facility ID as a parameter
    echo "<a href='http://localhost/miniproject/facilitydelete.php?facility_id=" . $row['facility_id'] . "'>";
    echo "<button>Delete</button>";
    echo "</a>";

    echo "</td>";
    echo "</tr>";
}
 // Free the result set
 mysqli_free_result($result);
} else {
    // Display an error message if the query fails
    echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

<!-- ... Remaining HTML code ... -->

        </table>
        <div class="create-new">
            <a href="http://localhost/miniproject/add_facility.php/" class="btn btn-primary">Create New Facility</a>
        </div>
        <div class="create-new">
            <a href="http://localhost/miniproject/adminpage.php/" class="btn btn-primary">Back To Admin Page</a>
        </div>
    </div>

    <!-- Include your other HTML content and scripts here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>
    <!-- Add other scripts -->

</body>

</html>
