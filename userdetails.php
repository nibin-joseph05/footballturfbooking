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
    <style>
        body {
            background-image: url('images/img6.jpg');
            background-size: cover;
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            width: 80%;
        }

        h2 {
            color: #333;
            text-align: center;
            margin: 0;
            padding-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
            border-radius: 5px;
        }

 /* Styles for the modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.8);
}

.modal-content {
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    max-width: 80%;
    max-height: 80%;
    position: relative; /* Ensure relative positioning for absolute children */
}

.modal-img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 10px;
}

.cancel-button {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 16px;
    background-color: #fff;
    color: #333;
    border: 1px solid #333;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.view-photo-link {
            text-align: center;
            margin-top: 10px;
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }



       
    </style>
    <title>User Details</title>
</head>

<?php
session_start();

$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the session variable containing user ID is set
if (isset($_SESSION['id'])) {
    // Fetch the user ID from the session
    $userId = $_SESSION['id'];

    // Fetch user details based on user ID
    $userData = mysqli_query($con, "SELECT * FROM customer_details WHERE id='$userId'");
    $userDetails = ($userData) ? mysqli_fetch_assoc($userData) : [];

    // Display user details in the form fields
    if (!empty($userDetails)) {
        $firstName = $userDetails['firstname'];
        $middleName = $userDetails['middlename'];
        $lastName = $userDetails['lastname'];
        $address = $userDetails['address'];
        $contact = $userDetails['contact'];
        $email = $userDetails['email'];
        $gender = $userDetails['gender'];
        $password = $userDetails['password'];
        $photo = $userDetails['image_path']; 
    }
}

if (isset($_POST['submit'])) {
    // Handle the form submission here
    // ...
}
?>

<body>
    <div class="container">
        <h2>My Account</h2>
        <table>
            <!-- Display user's photo as the first row in the table -->
            <tr>
                <td colspan="2" style="text-align: center;">
                    <img src="<?php echo isset($userDetails['image_path']) ? $userDetails['image_path'] : 'default.jpg'; ?>" alt="User Photo" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 10px;" onclick="openModal()">
                    <div class="view-photo-link" onclick="openModal()">View Photo</div>
                </td>
            </tr>

            <tbody>
                <!-- Display other user details in the table -->
                <tr>
                    <td>ID</td>
                    <td><?php echo isset($userDetails['id']) ? $userDetails['id'] : ''; ?></td>
                </tr>

                <tr>
                    <td>First Name</td>
                    <td><?php echo isset($userDetails['firstname']) ? $userDetails['firstname'] : ''; ?></td>
                </tr>

                <tr>
                    <td>Middle Name</td>
                    <td><?php echo isset($userDetails['middlename']) ? $userDetails['middlename'] : ''; ?></td>
                </tr>

                <tr>
                    <td>Last Name</td>
                    <td><?php echo isset($userDetails['lastname']) ? $userDetails['lastname'] : ''; ?></td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td><?php echo isset($userDetails['address']) ? $userDetails['address'] : ''; ?></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><?php echo isset($userDetails['email']) ? $userDetails['email'] : ''; ?></td>
                </tr>

                <tr>
                    <td>Contact</td>
                    <td><?php echo isset($userDetails['contact']) ? $userDetails['contact'] : ''; ?></td>
                </tr>

                <tr>
                    <td>Gender</td>
                    <td><?php echo isset($userDetails['gender']) ? $userDetails['gender'] : ''; ?></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><?php echo isset($userDetails['password']) ? $userDetails['password'] : ''; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="button-container">
            <a href="managedetails.php" class="button">Edit Your Details</a>
            <a href="userpage.php" class="button">Back</a>
           
            
        </div>
    </div>

    <!-- Modal for displaying the larger image -->
    <div id="myModal" class="modal">
    <div class="modal-content">
        <button class="cancel-button" onclick="closeModal()">Cancel</button>
        <img src="<?php echo isset($userDetails['image_path']) ? $userDetails['image_path'] : 'default.jpg'; ?>" class="modal-img" alt="User Photo">
    </div>

</div>
    <script>
        // JavaScript functions to handle modal opening and closing
        function openModal() {
            document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script>
</body>
</html>
