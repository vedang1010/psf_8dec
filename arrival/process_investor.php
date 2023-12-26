<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $host = "localhost"; // Hostname (e.g., "localhost")
    $username = "u331863597_biec"; // Database username
    $password = "psf@BIEC69"; // Database password
    $database = "u331863597_event"; // Database name

    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process user input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image = $_FILES['image'];

    // Get the original filename and file extension
    $originalFileName = $image['name'];
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    // Generate a unique filename based on the investor's first name and maintain the extension
    $investorFirstName = explode(' ', $name)[0];
    $newImageFileName = $investorFirstName . '.' . $fileExtension;

    // Define the directory to store images
    $imageDir = 'investorimages/';

    // Create the directory if it doesn't exist
    if (!file_exists($imageDir)) {
        mkdir($imageDir, 0777, true);
    }

    // Move the uploaded image to the directory with the new filename
    $imagePath = $imageDir . $newImageFileName;
    move_uploaded_file($image['tmp_name'], $imagePath);

    // Insert the investor data into the database
    $insertQuery = "INSERT INTO investors (name, image_url, has_arrived) VALUES ('$name', '$imagePath', 0)";

    if (mysqli_query($conn, $insertQuery)) {
        // echo "Investor created successfully.";
        // sleep(3);
        // Redirect after the specified delay
        header("Location: https://punestartupfest.in/arrival/create_investor.php");
        

    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
