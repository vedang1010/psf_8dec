<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $host = "localhost";
    $username = "u331863597_biec";
    $password = "psf@BIEC69";
    $database = "u331863597_event";

    // Create a database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process user input
    $name = mysqli_real_escape_string($conn, $_POST['startup_name']);
    $image = $_FILES['image'];
    $stall_no = mysqli_real_escape_string($conn, $_POST['stall_no']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $issue = mysqli_real_escape_string($conn, $_POST['issue']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Get the original filename and file extension
    $originalFileName = $image['name'];
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    // Generate a unique filename based on the investor's first name and maintain the extension
    $startupName = explode(' ', $name)[0];
    $newImageFileName = $startupName . '.' . $fileExtension;

    // Define the directory to store images
    $imageDir = 'issues_images/';

    // Create the directory if it doesn't exist
    if (!file_exists($imageDir)) {
        mkdir($imageDir, 0777, true);
    }

    // Move the uploaded image to the directory with the new filename
    $imagePath = $imageDir . $newImageFileName;
    move_uploaded_file($image['tmp_name'], $imagePath);

    // Insert the startup issue data into the database
    $insertQuery = "INSERT INTO startup_issues (startup_name, image_url, stall_no, contact, issue, description, solved) VALUES ('$name', '$imagePath', '$stall_no', '$contact', '$issue', '$description', 0)";

    if (mysqli_query($conn, $insertQuery)) {
        // Send Notification

        $url = "https://fcm.googleapis.com/fcm/send";
        $serverKey = "AAAAnhWU6Tk:APA91bE5GdjZCLzYTtxSp7yKbbMPHbQ7HM1Xx8mbNHHj2r9uJTdvpT96NpQiU3qSrGWl6Vb4jmuSW3ouVL8e7dYAVHQFFTmDKpFWyLuLUNrjjbS5W-nffDrKEsKepfvLcIEeQ6VkY01X";

        // Query to retrieve registration IDs from your database
        $query = "SELECT firebase_token FROM firebase_user_token";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Error fetching registration IDs: " . mysqli_error($conn));
        }

        $registrationIds = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $registrationIds[] = $row['firebase_token'];
        }
        $image_link="https://punestartupfest.in/startup_issues/".$imagePath;

        // Notification message
        $message = array(
            "data" => array(
                "title" => "New Issue: " . $issue,
                "body" => "Startup: " . $startupName . "\nStall No: " . $stall_no . "\nContact: " . $contact . "\nDescription: " . $description . "\nImage Link: " . $image_link,
                "icon" => "https://www.clipscutter.com/image/brand/brand-256.png",
                "image" => $image_link,
                "click_action" => "https://punestartupfest.in/startup_issues/ops_login.html"
            ),
            "registration_ids" => $registrationIds,
        );

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: key=" . $serverKey,
                "Content-Type: application/json",
            ),
            CURLOPT_POSTFIELDS => json_encode($message),
        );

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);

        if ($response === false) {
            echo "Error sending message: " . curl_error($curl);
        } else {
            echo '<script>alert("Message sent successfully!");</script>';
        }

        curl_close($curl);
// Redirect after successful submission
        echo '<script>';
        echo 'alert("Issue submitted successfully!");';
        echo 'window.location.href = "https://punestartupfest.in/startup_issues/add_issue.html";';
        echo '</script>';

        // Redirect after successful submission
        echo '<script>alert("Issue submitted successfully!");</script>';

    // Redirect after successful submission
        header("Location: https://punestartupfest.in/startup_issues/add_issue.html");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
