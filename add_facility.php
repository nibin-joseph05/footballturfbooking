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
            background-color: #6C7E8A;
            margin: 0; 
            padding: 20px;
          
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
            width: 800px;
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

        .left-side,
        .right-side {
            flex: 1;
        }

        .two-column-form {
            display: flex;
            flex-direction: row;
        }

        .left-side {
            margin-right: 10px;
        }

        .larger-button {
            padding: 16px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-top: 20px;
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
</head>

<script>
    // Push a new state to the history whenever the page is loaded
    history.pushState(null, null, document.URL);

    // Disable the back and forward buttons
    window.addEventListener('popstate', function (event) {
      history.pushState(null, null, document.URL);
    });
  </script>



<body>
    <div class="signup-form">
        <h1><i class="fas fa-clipboard"></i> Facility Registration</h1>

        <?php
        $con = mysqli_connect("localhost", "admin", "admin", "miniproject");

        if (mysqli_connect_errno()) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['submit'])) {
            $mt1 = $_POST['t1'];
            $mt2 = $_POST['t2'];
            $mt3 = $_POST['t3'];
            $mt4 = $_POST['t4'];
            $mt5 = $_POST['t5'];
            move_uploaded_file($_FILES['photo']["tmp_name"], "img/" . $_FILES['photo']["name"]);
            $photo = "img/" . $_FILES['photo']["name"];
            $n = mysqli_query($con, "INSERT INTO facility_list (name, description, rate, status, image_path, place) VALUES ('$mt1', '$mt2', '$mt3', '$mt4', '$photo','$mt5')");

            if ($n > 0) {
                echo "<script>alert('Facility added successfully');</script>";
                header('Location: facility_list.php');
            }
        }
        ?>

        <form method="post" enctype="multipart/form-data" class="two-column-form">
            <!-- Left Side -->
            <div class="left-side">
                <div class="form-group">
                    <label for="category_id"><i class="fas fa-list-alt"></i> Category</label>
                    <select name="category_id" id="category_id" tabindex="-1" aria-hidden="true">
                        <option value="" selected disabled></option>
                        <option value="2">Football Turf</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="first-name"><i class="fas fa-futbol"></i> Name Of The Turf</label>
                    <input type="text" id="first-name" name="t1" required>
                </div>
                <div class="form-group">
                    <label for="last-name"><i class="fas fa-info-circle"></i> Description</label>
                    <input type="text" id="last-name" name="t2" required>
                </div>
                <div class="form-group">
                    <label for="contact"><i class="fas fa-dollar-sign"></i> Rate Per Day</label>
                    <input type="tel" id="contact" name="t3" required>
                </div>
            </div>

            <!-- Right Side -->
            <div class="right-side">
                <div class="form-group">
                    <label for="place"><i class="fas fa-map-marker-alt"></i>Place</label>
                    <input type="text" id="place" name="t5" required>
                </div>

                <div class="form-group">
                    <label for="status"><i class="fas fa-check-circle"></i> Status</label>
                    <select name="t4" id="status" class="custom-select selevt">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="avatar"><i class="fas fa-image"></i> Upload Turf Image</label>
                    <input type="file" id="avatar" name="photo" accept="image/*">
                </div>

                <button type="submit"name="submit"><i class="fas fa-save"></i> Save Details</button>


    </form>
               


<a href='http://localhost/miniproject/facility_list.php' class="back-to-home">Go Back</a>


</div>



</body>

</html>
