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
        // Generate options from 1 to 10
        for ($i = 1; $i <= 10; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
    </select>

    <input type="button" value="Option 1" onclick="sendValues(1)">
    <input type="button" value="Option 2" onclick="sendValues(2)">
    <input type="button" value="Option 3" onclick="sendValues(3)">
    <input type="button" value="Option 4" onclick="sendValues(4)">
    <input type="button" value="Option 5" onclick="sendValues(5)">

    <!-- Add more input buttons if needed -->

    <input type="button" value="Submit" onclick="submitForm()">
</form>

<script>
var selectedOption;
var correctAnswer; // Define correctAnswer as a global variable

function sendValues(answer) {
    selectedOption = document.getElementById("optionNumber").value;
    console.log("Selected Option:", selectedOption);
    console.log("Correct Answer:", answer);

    // Remove the 'selected-option' class from all buttons
    var buttons = document.querySelectorAll('input[type="button"]');
    buttons.forEach(function(button) {
        button.classList.remove('selected-option');
    });

    // Add the 'selected-option' class to the clicked button
    var clickedButton = event.target;
    clickedButton.classList.add('selected-option');

    // Set the correctAnswer global variable
    correctAnswer = answer;
}

function submitForm() {
    if (selectedOption === undefined || correctAnswer === undefined) {
        alert("Please select an option before submitting.");
        return;
    }

    // Perform AJAX request to send the values to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit_option.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the server response if needed
            console.log(xhr.responseText);
        }
    };

    // Send both selected option and correct answer to the server
    xhr.send('optionNumber=' + encodeURIComponent(selectedOption) + '&correctAnswer=' + encodeURIComponent(correctAnswer));
}
</script>

</body>
</html>
