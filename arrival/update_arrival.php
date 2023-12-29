<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the investor ID from the POST request
    $investorId = $_POST['investorId'];

    // Update the "has_arrived" status in the database
    $host = "localhost"; // Hostname (e.g., "localhost")
    $username = "u331863597_biec"; // Database username
    $password = "psf@BIEC69"; // Database password
    $database = "u331863597_event"; // Database name

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "UPDATE investors SET has_arrived = 1 WHERE id = $investorId";

    if (mysqli_query($conn, $query)) {
        // Send Notification

        // Fetch investor details
        $fetchInvestorQuery = "SELECT name, image_url FROM investors WHERE id = $investorId";
        $investorResult = mysqli_query($conn, $fetchInvestorQuery);

        if (!$investorResult) {
            die("Error fetching investor details: " . mysqli_error($conn));
        }

        $investorDetails = mysqli_fetch_assoc($investorResult);

        // Query to retrieve registration IDs from your database
        $query = "SELECT firebase_token FROM firebase_startup_token";
        $result = mysqli_query($conn, $query);
        $image_link="https://punestartupfest.in/arrival/".$investorDetails['image_url'];

        if (!$result) {
            die("Error fetching registration IDs: " . mysqli_error($conn));
        }

        $registrationIds = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $registrationIds[] = $row['firebase_token'];
        }

        $url = "https://fcm.googleapis.com/fcm/send";
        $serverKey = "AAAAnhWU6Tk:APA91bE5GdjZCLzYTtxSp7yKbbMPHbQ7HM1Xx8mbNHHj2r9uJTdvpT96NpQiU3qSrGWl6Vb4jmuSW3ouVL8e7dYAVHQFFTmDKpFWyLuLUNrjjbS5W-nffDrKEsKepfvLcIEeQ6VkY01X";

        // Notification message
        $message = array(
            "data" => array(
                "title" => "Investor Arrived: " . $investorDetails['name'],
                // "title" => "Investor Arrived: " . $image_link,
                "body" => "Investor has arrived!",
                "icon" => "https://punestartupfest.in/images/navbarAndFooter/PSF24%20White.png",
                "image" => $image_link,
                "click_action" => "https://punestartupfest.in/arrival/long_polling",
                // "name" => $investorDetails['name'],
                // "image_url" => $investorDetails['image_url'],
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
            echo '<script>alert("Message sent successfully!");</script>';
        }

        curl_close($curl);

        // Redirect after successful submission
        header("Location: https://punestartupfest.in/arrival/markArrival.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
