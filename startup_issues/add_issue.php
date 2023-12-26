<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Issue</title>
    <style>
        /* Add CSS styles for form layout */
        /* ... Your CSS styles here ... */
        /* Style the form container */
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #131b3d;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


/* Optional: Add additional styles for validation/error messages */
.error-message {
    color: #e74c3c;
    margin-top: 5px;
}


.form {
  --input-focus: #2d8cf0;
  --font-color: #323232;
  --font-color-sub: #666;
  --bg-color: #fff;
  --main-color: #323232;
  padding: 20px;
  background: lightgrey;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  gap: 20px;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  box-shadow: 4px 4px var(--main-color);
  margin-top: 40px;
}

.title {
  color: var(--font-color);
  font-weight: 900;
  font-size: 20px;
  margin-bottom: 25px;
}

.title span {
  color: var(--font-color-sub);
  font-weight: 600;
  font-size: 17px;
}

.input {
  width: 300px;
  height: 40px;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  background-color: var(--bg-color);
  box-shadow: 4px 4px var(--main-color);
  font-size: 15px;
  font-weight: 600;
  color: var(--font-color);
  padding: 5px 10px;
  outline: none;
}

.input::placeholder {
  color: var(--font-color-sub);
  opacity: 0.8;
}

.input:focus {
  border: 2px solid var(--input-focus);
}

.button-confirm:active {
  box-shadow: 0px 0px var(--main-color);
  transform: translate(3px, 3px);
}

.button {
  margin: auto 0 auto;
  width: 120px;
  height: 40px;
  border-radius: 5px;
  border: 2px solid var(--main-color);
  background-color: var(--bg-color);
  box-shadow: 4px 4px var(--main-color);
  font-size: 17px;
  font-weight: 600;
  color: var(--font-color);
  cursor: pointer;
}

#submit {
    position: relative;
    margin: 50px auto 0 auto;
}

#description {
  height: 100px;
}

@media (min-width: 319px) and (max-width: 500px) {
            .input .form {
                display: grid;
                width: 80%;
                
                margin-top: 200px;
                min-height: 450px;
                margin: auto;
                justify-content: center;
            }
        }


    </style>
</head>
<body>
    <!--<h1>Create Investor</h1>-->
    <!--<form action="process_issue.php" method="POST" enctype="multipart/form-data">-->
    <!--    <label for="name">Name:</label>-->
    <!--    <input type="text" name="name" id="name" required><br><br>-->

    <!--    <label for="image">Image:</label>-->
    <!--    <input type="file" name="image" id="image" accept="image/*" required><br><br>-->

    <!--    <input type="submit" name="submit" value="Create Investor">-->
    <!--</form>-->

    <!--
    <form action="process_issue.php" method="POST" enctype="multipart/form-data">
    <label for="startup_name">Startup Name:</label>
    <input type="text" name="startup_name" id="startup_name" required><br><br>

     <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*" ><br><br>

    <label for="stall_no">Stall Number:</label>
    <input type="text" name="stall_no" id="stall_no" required><br><br>

    <label for="contact">Contact:</label>
    <input type="text" name="contact" id="contact" required><br><br>

    <label for="issue">Issue:</label>
    <input type="text" name="issue" id="issue" required><br><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" ></textarea><br><br>

    <input type="submit" name="submit" value="Submit issue">
</form>

    -->

<form class="form" action="process_issue.php" method="POST" enctype="multipart/form-data">
    <div class="title">PSF'24<br />
        <span>add_issue</span>
    </div>

    <input
      placeholder="Startup Name"
      type="text"
      required
      id="startup_name"
      name="startup_name"
      class="input"
    />

    <input
      placeholder="Stall Number"
      type="text"
      required
      id="stall_no"
      name="stall_no"
      class="input"
    />
  
    <br />
    Upload Image (if any)
    <input
      placeholder="Image"
      accept="image/*"
      type="file"
      id="image"
      name="image"
      class="input"
    />
  
    <input
      placeholder="Contact"
      type="text"
      required=
      id="contact"
      name="contact"
      class="input"
    />
    <input
      placeholder="Issue"
      type="text"
      required
      id="issue"
      name="issue"
      class="input"
    />
  
    <textarea
      name="description"
      placeholder="Description"
      type="text"
      id="description"
      class="input"
    ></textarea>
  
    <input class="button" id="submit" type="submit" name="submit" value="Submit">
  </form>
  



 <script>
        // Add JavaScript for displaying a popup after form submission
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.querySelector('.form');
            form.addEventListener('submit', function () {
                alert('Issue submitted successfully!');
            });
        });
    </script>
</body>
</html>
