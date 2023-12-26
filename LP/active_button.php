<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown and Buttons</title>
    <style>
        /* Add your desired styles here */
        .selected-option {
            background-color: #66bb6a; /* Green color as an example */
            color: #fff; /* White text color as an example */
        }
    </style>
</head>
<body>

<h2>Select an Option:</h2>

<form id="optionsForm">
    <label for="optionNumber">Select Option Number:</label>
    <select id="optionNumber" name="optionNumber">
        <?php
        // Generate options from 1 to 15
        for ($i = 1; $i <= 15; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select>

    <input type="button" value="Submit" onclick="submitForm()">
</form>

<script>
var selectedOption;

function submitForm() {
    selectedOption = document.getElementById("optionNumber").value;
    console.log("Selected Option:", selectedOption);

    if (selectedOption === undefined || selectedOption === "") {
        alert("Please select an option before submitting.");
        return;
    }

    // Perform AJAX request to send the values to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "change_active_button.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the server response if needed
            console.log(xhr.responseText);
        }
    };

    // Send selected option to the server
    xhr.send('optionNumber=' + encodeURIComponent(selectedOption));
}
</script>

</body>
</html>
