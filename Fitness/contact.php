<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="./files/logo.png">
    <link rel="stylesheet" type="text/css" href="./css/html.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body class="contactbody">
    <?php
    $servername = "localhost"; // Replace with your database server name
    $username = "root"; // Replace with your database username
    $password = "pavi"; // Replace with your database password
    $dbname = "reg"; // Use the same database name as the registration form

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Initialize variables for form data
    $name = $email = $subject = $message = "";
    $name_err = $email_err = $subject_err = $message_err = "";

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty(trim($_POST["myname"]))) {
            $name_err = "Please enter your name.";
        } else {
            $name = trim($_POST["myname"]);
        }

        // Validate email
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter your email.";
        } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
        } else {
            $email = trim($_POST["email"]);
        }

        // Validate subject
        if (empty(trim($_POST["subject"]))) {
            $subject_err = "Please enter a subject.";
        } else {
            $subject = trim($_POST["subject"]);
        }

        // Validate message
        if (empty(trim($_POST["message"]))) {
            $message_err = "Please enter your message.";
        } else {
            $message = trim($_POST["message"]);
        }

        // If no errors, insert data into the database
        if (empty($name_err) && empty($email_err) && empty($subject_err) && empty($message_err)) {
            $sql = "INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);

                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Message sent successfully!');</script>";
                } else {
                    echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
            }
        }

        // Close connection
        mysqli_close($link);
    }
    ?>

    <nav>
        <img src="./files/logo.jpg" class="logo" alt="Logo" title="FirstFlight Travels">
        <ul class="navbar">
            <li>
                <a href="./index.html">Home</a>
                <a href="./index.html#Lect">Lecturer's</a>
                <a href="./about.php">About Us</a>
                <a href="./contact.php">Contact Us</a>
            </li>
        </ul>
    </nav>

    <section class="contact">
        <div class="contact-form">
            <h1>Contact <span>Us</span></h1>
            <p>We are always out there to help you! Fill out the form given below and get a reply from us within 2 business days.</p>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="myname" placeholder="Your Name" required value="<?= htmlspecialchars($name); ?>">
                <small class="text-danger"><?= $name_err; ?></small>
                
                <input type="email" name="email" placeholder="Enter your E-mail" required value="<?= htmlspecialchars($email); ?>">
                <small class="text-danger"><?= $email_err; ?></small>
                
                <input type="text" name="subject" placeholder="How can we help you?" required value="<?= htmlspecialchars($subject); ?>">
                <small class="text-danger"><?= $subject_err; ?></small>
                
                <textarea name="message" cols="30" rows="10" placeholder="Share your thoughts" required><?= htmlspecialchars($message); ?></textarea>
                <small class="text-danger"><?= $message_err; ?></small>

                <input type="submit" value="Submit" class="submit-btn">
                <div class="connect-section">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/mohd.rahil.blogger" target="_blank"><i class='bx bxl-facebook'></i></a>
                        <a href="https://www.instagram.com/mohdrahil101" target="_blank"><i class='bx bxl-instagram'></i></a>
                        <a href="https://www.youtube.com/techdollarz" target="_blank"><i class='bx bxl-youtube'></i></a>
                   </div>
                </div>
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
