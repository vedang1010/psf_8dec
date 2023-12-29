<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send to Buttons</title>
</head>

<body>
    <script>
        function sendIdToButtonsPhp(id) {
            var xhr = new XMLHttpRequest();
            var url = 'buttons.php';
            var params = 'id=' + id;

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from buttons.php if needed
                    console.log(xhr.responseText);
                }
            };

            xhr.send(params);
        }

        // Call the function with the fetched ID
        sendIdToButtonsPhp('<?php include('get_active_button.php'); ?>');
    </script>
</body>

</html>
