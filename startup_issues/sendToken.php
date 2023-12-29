<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the value of the JavaScript variable from the POST request
    $jsVariable = $_POST["jsVariable"];

    // Database connection parameters
    $host = "localhost";
    $dbUsername = "u331863597_biec";
    $dbPassword = "psf@BIEC69";
    $dbName = "u331863597_event"; // Replace with your database name

    // Create a database connection
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to check if the token already exists
    $checkQuery = "SELECT * FROM firebase_user_token WHERE firebase_token = ?";
    $checkStmt = mysqli_prepare($conn, $checkQuery);

    if ($checkStmt) {
        mysqli_stmt_bind_param($checkStmt, "s", $jsVariable);
        mysqli_stmt_execute($checkStmt);
        mysqli_stmt_store_result($checkStmt);

        // If the token doesn't exist, insert it
        if (mysqli_stmt_num_rows($checkStmt) == 0) {
            // SQL query to insert the JavaScript variable into a specific table and column
            $insertQuery = "INSERT INTO firebase_user_token (firebase_token) VALUES (?)";

            // Prepare and execute the query
            $insertStmt = mysqli_prepare($conn, $insertQuery);

            if ($insertStmt) {
                mysqli_stmt_bind_param($insertStmt, "s", $jsVariable);
                $result = mysqli_stmt_execute($insertStmt);

                if ($result) {
                    // Data inserted successfully
                    echo "Data inserted successfully.";
                } else {
                    echo "Error inserting data: " . mysqli_error($conn);
                }

                mysqli_stmt_close($insertStmt);
            } else {
                echo "Error preparing the SQL statement: " . mysqli_error($conn);
            }
        } else {
            // Token already exists
            echo "Token already exists in the database.";
        }

        mysqli_stmt_close($checkStmt);
    } else {
        echo "Error preparing the SQL statement: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
