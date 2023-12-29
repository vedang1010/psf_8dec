<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your database connection parameters
    $host = "localhost";
    $dbUsername = "u331863597_biec";
    $dbPassword = "psf@BIEC69";
    $dbName = "u331863597_event"; // Replace with your database name

    // Create a database connection
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

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

    // Get data from the form
    $startupName = $_POST['startup_name'];
    $stallNo = $_POST['stall_no'];
    $contact = $_POST['contact'];
    $issue = $_POST['issue'];
    $description = $_POST['description'];

    // Check if an image is uploaded
    $image = isset($_FILES['image']) ? $_FILES['image'] : null;
    $imageURL = "https://www.clipscutter.com/image/brand/brand-256.png"; // Default image URL

    if ($image && $image['error'] == UPLOAD_ERR_OK) {
        $uploadDir = "https://punestartupfest.in/startup_issues/issues_images"; // Set your upload directory on the server
        $uploadPath = $uploadDir . '/' . basename($image['name']);
        
        if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
            $imageURL = $uploadPath;
            // echo '<script>console.log("' . $imageURL . '")</script>';
        }
    }

    mysqli_close($conn);

    $url = "https://fcm.googleapis.com/fcm/send";

    $serverKey = "AAAAnhWU6Tk:APA91bE5GdjZCLzYTtxSp7yKbbMPHbQ7HM1Xx8mbNHHj2r9uJTdvpT96NpQiU3qSrGWl6Vb4jmuSW3ouVL8e7dYAVHQFFTmDKpFWyLuLUNrjjbS5W-nffDrKEsKepfvLcIEeQ6VkY01X"; // Replace with your FCM server key

    $message = array(
        "data" => array(
            "title" => "New Issue: " . $issue,
            "body" => "Startup: " . $startupName . "\nStall No: " . $stallNo . "\nContact: " . $contact . "\nDescription: " . $description . "\nImage Link: " . $imageURL,
            "icon" => "https://images.unsplash.com/photo-1514473776127-61e2dc1dded3?w=871&q=80",
            "image" => $imageURL,
            "click_action" => "https://punestartupfest.in/startup_issues/ops_login.html"
        ),
        "registration_ids" => $registrationIds, // Add the registration IDs from the database
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
        echo "Message sent successfully";
        echo '<script>console.log("' . $message["data"]["image"] . '")</script>';
        echo '<script>alert("' . $message["data"]["image"] . '")</script>';
    }

    curl_close($curl);
} else {
    echo "Invalid request.";
}
?>
