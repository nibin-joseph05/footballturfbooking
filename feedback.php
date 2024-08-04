<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('img/loginpage.jpg') center/cover no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #fff;
        }

        .feedback-container {
            width: 400px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #333;
        }

        input, textarea {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        .button {
      display: inline-block;
      padding: 10px 10px;
      background-color: #2ecc71; /* Green color */
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }

    .button:hover {
      background-color: #27ae60; /* Darker green on hover */
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

<?php

// Start or resume a session
session_start();

$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    if (isset($_POST['submit'])) { 
        $name = $_POST['name'];
        $feedback = $_POST['feedback'];

        // Insert feedback along with user_id into the feedback table
        $query = "INSERT INTO feedback (user_id, username, feedback) VALUES ('$user_id', '$name', '$feedback')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script> alert('Feedback submitted successfully');</script>";
            header('location: userpage.php');
            exit; // Optional: Prevent further execution if needed
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
} else {
    echo "User not logged in"; // Handle the case where the user is not logged in
}

mysqli_close($con);

?>











<body>

<div class="feedback-container">
    <h2>User Feedback</h2>
    <form action="#" method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="feedback">Your Feedback:</label>
        <textarea id="feedback" name="feedback" rows="4" required></textarea>

        <button type="submit" name="submit">Submit Feedback</button>
    </form>
    <a href="userpage.php" class="button">Back to Home</a>
</div>

</body>
</html>
