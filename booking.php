<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turf Details</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wsPxEeE7UToa0W5OZtPMAyCypAsI5e8lPylw2+b8V+Ju2lmM1Vazq3dM0CpbQc7o5M5FjfcNZ9FaDDQc5nayww==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include necessary stylesheets and scripts -->
    <style>
      body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

.container_bg {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
    text-align: center;
}

#venue-details {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 30px;
}

.block {
    background-color: #f8f8f8;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    flex: 1;
}

h2 {
    color: green;
    margin-bottom: 20px;
}

.adjustable-photo {
    width: 700px;
    height: 400px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

.turf-details {
    text-align: left;
}

.turf-details p {
    margin-bottom: 15px;
    color: #555;
}

.details-right {
    flex: 1;
    text-align: left;
    padding: 0 20px;
}

.book-now-button {
    background-color: #007bff;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease-in-out;
    display: inline-block;
}

.book-now-button:hover {
    background-color: #0056b3;
}

.home-button {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease-in-out;
    margin-top: 10px;
}

.home-button i {
    margin-right: 5px;
}

.home-button:hover {
    background-color: #0056b3;
}
/* Add this to your existing styles */
.search-container {
    margin-bottom: 10px; /* Increase the bottom margin for better spacing */
}

#search-place {
    width: 300px; /* Set the width of the input field as needed */
    height: 20px; /* Set the height of the input field as needed */
    padding: 8px; /* Adjust the padding for better appearance */
}

button[type="submit"] {
    height: 40px; /* Set the height of the button to match the input field */
    margin-left: 5px; /* Add some margin between the input field and the button */
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
   
    <div class="container_bg">
         <!-- Add this above your PHP code -->
<div class="search-container">
    <form action="" method="GET">
        <label for="search-place">Search by Place:</label>
        <input type="text" id="search-place" name="search" placeholder="Enter place...">
        <button type="submit">Search</button>
    </form>
</div>
<?php
session_start();

$con = mysqli_connect("localhost", "admin", "admin", "miniproject");

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Modify your SQL query to include the search condition
$query = "SELECT * FROM facility_list";
if (!empty($searchQuery)) {
    $query .= " WHERE place LIKE '%$searchQuery%'";
}

// Fetch data from the facility_list table
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div id='venue-details' class='block'>";
            echo "<div class='adjustable-photo'><img src='" . resizeImage($row['image_path'], 700, 400) . "' alt='" . $row['name'] . "'></div>";

            echo "<div class='details-right'>";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>Description: " . $row['description'] . "</p>";
            echo "<p>Rate: " . $row['rate'] . "</p>";
            echo "<p>Status: " . ($row['status'] == 1 ? 'Active' : 'Inactive') . "</p>";
            echo "<p>Place: " . $row['place'] . "</p>";
            echo "<a href='datebook.php?facility_id=" . $row['facility_id'] . "' class='book-now-button'>Book Now</a>";
            echo "<a href='userpage.php' class='home-button'><i class='fas fa-home'></i> Back to Home</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No facilities found for the specified place.</p>";
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo "Error in executing the query: " . mysqli_error($con);
}

function resizeImage($imagePath, $width, $height)
{
    // Get the image type
    $imageType = exif_imagetype($imagePath);

    // Load the image based on its type
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $originalImage = imagecreatefromjpeg($imagePath);
            break;
        case IMAGETYPE_PNG:
            $originalImage = imagecreatefrompng($imagePath);
            break;
        case IMAGETYPE_GIF:
            $originalImage = imagecreatefromgif($imagePath);
            break;
        default:
            // Unsupported image type
            return '';
    }

    // Create a new true color image with the desired dimensions
    $resizedImage = imagecreatetruecolor($width, $height);

    // Preserve transparency for PNG and GIF images
    if ($imageType === IMAGETYPE_PNG || $imageType === IMAGETYPE_GIF) {
        imagecolortransparent($resizedImage, imagecolorallocatealpha($resizedImage, 0, 0, 0, 127));
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
    }

    // Resize the image
    imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, $width, $height, imagesx($originalImage), imagesy($originalImage));

    // Output the resized image
    ob_start();
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($resizedImage);
            break;
        case IMAGETYPE_PNG:
            imagepng($resizedImage);
            break;
        case IMAGETYPE_GIF:
            imagegif($resizedImage);
            break;
    }
    $imageData = ob_get_clean();

    // Destroy the images to free up memory
    imagedestroy($originalImage);
    imagedestroy($resizedImage);

    // Return base64-encoded resized image
    return 'data:image/' . image_type_to_mime_type($imageType) . ';base64,' . base64_encode($imageData);
}

?>








    </div>






  
</body>

</html>
