<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here</title>
    <link rel="icon" href="./files/logo.png">
    <link rel="stylesheet" type="text/css" href="./css/html.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body class="register-body">
<?php
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = "pavi"; // Replace with your database password
$dbname = "reg"; // Replace with your database name

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$name = $email = $phone = $age = $gender = "";
$name_err = $email_err = $phone_err = $age_err = $gender_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["myname"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["myname"]);
    }

    // Validate email
    if (empty(trim($_POST["myemail"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var(trim($_POST["myemail"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = trim($_POST["myemail"]);
    }

    // Validate phone
    if (empty(trim($_POST["myphone"]))) {
        $phone_err = "Please enter your phone number.";
    } elseif (strlen(trim($_POST["myphone"])) != 10 || !is_numeric(trim($_POST["myphone"]))) {
        $phone_err = "Phone number must be a 10-digit numeric value.";
    } else {
        $phone = trim($_POST["myphone"]);
    }

    // Validate age
    if (empty(trim($_POST["myage"]))) {
        $age_err = "Please enter your age.";
    } else {
        $age = trim($_POST["myage"]);
    }

    // Validate gender
    if (empty($_POST["mygender"])) {
        $gender_err = "Please select your gender.";
    } else {
        $gender = $_POST["mygender"];
    }

    // If there are no errors, process the data (e.g., save to database or perform some action)
    if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($age_err) && empty($gender_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, email, phone, age, gender) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssis", $name, $email, $phone, $age, $gender);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Registration successful!');</script>";
                
                // Redirect to index file after successful registration
                header("Location: index.html");  // Replace 'index.html' with the actual path of your index file
                exit;  // Ensure script stops executing after the redirect
            } else {
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
        }  
    }
}

// Close connection
mysqli_close($link);
?>


    <nav>
        <img src="./files/logo.jpg" class="logo" alt="Logo" title="Travels">

        <ul class="navbar">
            <li>
                <a href="./index.html">Home</a>
                <a href="./index.html#Lect">Lecturer's</a>
                <a href="./index.html#package">Techniques</a>
                <a href="./about.php">About Us</a>
                <a href="./contact.php">Contact Us</a>
            </li>
        </ul>
    </nav>

    <section class="registration">
        <div class="register-form">
            <h1>Register <span>Here..!</span></h1>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <input type="text" name="myname" placeholder="Name" id="name" value="<?= htmlspecialchars($name); ?>" required>
                <small class="text-danger"><?= $name_err; ?></small>

                <input type="email" name="myemail" placeholder="Email-Id" value="<?= htmlspecialchars($email); ?>" required>
                <small class="text-danger"><?= $email_err; ?></small>

                <input type="tel" name="myphone" placeholder="Phone No." id="phonenum" value="<?= htmlspecialchars($phone); ?>" required>
                <small class="text-danger"><?= $phone_err; ?></small>

                <input type="number" name="myage" placeholder="Age" value="<?= htmlspecialchars($age); ?>" required>
                <small class="text-danger"><?= $age_err; ?></small>

                <h4>Gender</h4>
                <input type="radio" name="mygender" value="Male" <?= ($gender == 'Male') ? 'checked' : ''; ?> required> Male &nbsp; &nbsp;
                <input type="radio" name="mygender" value="Others" <?= ($gender == 'Others') ? 'checked' : ''; ?> required> Others &nbsp; &nbsp;
                <input type="radio" name="mygender" value="Female" <?= ($gender == 'Female') ? 'checked' : ''; ?>> Female
                <small class="text-danger"><?= $gender_err; ?></small>

                <input type="submit" value="Submit" class="submitbtn">

            </form>
        </div>
    </section>

    <!-- Footer -->

    <section class="footer">
        <div class="end">
            <p>Copyright © 2024 Travels All Rights Reserved.<br>Website developed by: Pavi</p>
        </div>
    </section>

</body>

</html>
