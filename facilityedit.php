<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="facilitystyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Add Facility Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            background: url('img/fb3.jpg') center/cover no-repeat fixed;

            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .signup-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            display: block;
        }

        input,
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .left-side {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .clearfix {
            clear: both;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-top: 20px;
        }

        /* Adjustments for responsive design */
        @media (max-width: 600px) {
            .signup-form {
                width: 100%;
            }
        }
        .back-to-home {
            display: inline-block;
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease-in-out;
        }

        .back-to-home:hover {
            background-color: #218838;
        }
    </style>
    <script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>

</head>

<?php
$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

// Check if facility_id is set in the URL
$r = isset($_GET['facility_id']) ? $_GET['facility_id'] : null;

// Initialize $result with an empty array
$result = [];

// Initialize message variable
$message = "";

// Check if $r is not null before attempting to fetch data
if ($r !== null) {
    $data = mysqli_query($con, "SELECT * FROM facility_list WHERE facility_id='$r'");
    $result = ($data) ? mysqli_fetch_array($data) : [];

    if ($result && isset($_POST['submit'])) {
        $mt1 = $_POST['t1'];
        $mt2 = $_POST['t2'];
        $mt3 = $_POST['t3'];
        $mt4 = $_POST['t5'];

        $n = mysqli_query($con, "UPDATE facility_list SET name='$mt1', description='$mt2', rate='$mt3', place='$mt4' WHERE facility_id='$r'");
        header('location:facility_list.php');

        if ($n > 0) {
            $message = "Facility details updated successfully";
        } else {
            $message = "Update query failed: " . mysqli_error($con);
        }

        // Fetch the updated data after the update operation
        $data = mysqli_query($con, "SELECT * FROM facility_list WHERE facility_id='$r'");
        $result = ($data) ? mysqli_fetch_array($data) : [];
    }
} else {
    $message = "Invalid facility ID";
}
?>




<body>
    <div class="signup-form">
        <h1><i class="fas fa-clipboard"></i> Facility Registration</h1>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category_id"><i class="fas fa-list-alt"></i> Category</label>
                <select name="category_id" id="category_id" tabindex="-1" aria-hidden="true">
                    <option value="" selected disabled></option>
                    <option value="2">Football Turf</option>
                </select>
            </div>

            <div class="left-side">
    <!-- Pre-fill form fields with existing data -->
    <div class="form-group">
        <label for="first-name"><i class="fas fa-futbol"></i> Name Of The Turf</label>
        <input type="text" id="first-name" name="t1" value="<?php echo $result['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="last-name"><i class="fas fa-info-circle"></i> Description</label>
        <input type="text" id="last-name" name="t2" value="<?php echo $result['description']; ?>" required>
    </div>
    <div class="form-group">
        <label for="contact"><i class="fas fa-dollar-sign"></i> Rate Per Day</label>
        <input type="tel" id="contact" name="t3" value="<?php echo $result['rate']; ?>" required>
    </div>
    <div class="form-group">
        <label for="place"><i class="fas fa-map-marker-alt"></i> Place</label>
        <input type="text" id="place" name="t5" value="<?php echo $result['place']; ?>" required>
    </div>
    <div class="form-group">
        <label for="status"><i class="fas fa-check-circle"></i> Status</label>
        <select name="t4" id="status" class="custom-select selevt">
            <option value="1" <?php echo ($result['status'] == 1) ? 'selected' : ''; ?>>Active</option>
            <option value="0" <?php echo ($result['status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
        </select>
    </div>
</div>

            <div class="clearfix"></div>
            <button type="submit" name="submit"><i class="fas fa-save"></i> Save Details</button>
        </form>
        <a href='http://localhost/miniproject/facility_list.php' class="back-to-home">Go Back</a>
      
    </div>
</body>

</html>
