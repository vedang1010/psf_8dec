<?php
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch top scorers based on total_points
$sql = "SELECT username, total_points FROM LP_audience_database ORDER BY total_points DESC LIMIT 10"; // Change 'your_table_name' to your actual table name

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #1c1c1c; /* Dark black background color */
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h2 {
            margin-top: 20px;
        }

        .leaderboard-entry {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .username {
            font-size: 18px;
            flex: 1;
            text-align: left;
            padding-left: 10px;
        }

        .bar-graph {
            flex: 2;
            height: 20px;
            background-color: #444; /* Dark gray background color for the bar graph container */
            margin: 10px auto;
        }

        .bar {
            height: 100%;
            background-color: #33cfff; /* Blue color for the bar graph */
        }

        .score {
            font-size: 18px;
            flex: 1;
            text-align: right;
            padding-right: 10px;
        }
    </style>
  <link rel="stylesheet" href="../styles/preloader.css">
</head>

<body>  
  <!-- PAGE LOADER -->
    <div id="loading">
      <div class="loader-container">
          <!-- Outer rings -->
          <div class="outer-ring1"></div>
          <div class="outer-ring2"></div>
          <div class="outer-ring3"></div>
          
          <div class="loader">
              <img class="image" src="../images/navbarAndFooter/PSF24 White.png" alt="PSF'24 LOGO">
          </div>
      </div>
  </div>
  <script>
      var loader = document.getElementById("loading");
      window.addEventListener("load", function () {
          setTimeout(function() {
              $('#loading').hide();
          }, 2000);
      })
  </script>
  <!-- PAGE LOADER END -->
    <?php
    if ($result->num_rows > 0) {
        echo "<h2>Leaderboard</h2>";

        while ($row = $result->fetch_assoc()) {
            echo "<div class='leaderboard-entry'>";
            echo "<p class='username'>" . $row["username"] . "</p>";
            echo "<div class='bar-graph'><div class='bar' style='width: " . ($row['total_points'] / 0.75) . "%;'></div></div>";
            echo "<p class='score'>" . $row["total_points"] . " Points</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No records found</p>";
    }

    $conn->close();
    ?>
</body>

</html>