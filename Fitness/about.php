<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="./files/logo.png">
    <link rel="stylesheet" type="text/css" href="./css/html.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body class="aboutbody">
    <?php
    $servername = "localhost"; // Replace with your database server name
    $username = "root"; // Replace with your database username
    $password = "yourpassword"; // Replace with your database password
    $dbname = "reg"; // Use the same database name as the registration form

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Process form submission for the news
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST["emailid"]);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format');</script>";
        } else {
            // Insert into database
            $sql = "INSERT INTO news (email) VALUES (?)";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);

                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Thank you for subscribing!');</script>";
                } else {
                    echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
                }

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
                <a href="./about.php">About Us</a>
                <a href="./contact.php">Contact Us</a>
            </li>
        </ul>
    </nav>
    
    <section class="about">
           <div class="main">
            <div class="abt-text">
                <h1>About <span>Us</span></h1>
                <p><centre>Welcome to Fitness and Wellness..! We are dedicated to helping you achieve a healthier and happier life through a balanced approach to fitness and wellness. 
                    Our mission is to create a supportive community where everyone can thrive, regardless of their fitness level.
                </centre></p>
                <a href="https://toneop.com/blog/concept-of-fitness-vs-wellness" class="connectbtn" target="_blank">More News!</a>

                
            </div>
            

           </div>
           

    </section>

    <section class="newsletter">
        <div class="newstext">
            <h2>INFO!</h2>
            <p>Enter your E-mail to get <br>more information!</p>
        </div>
    
        <div class="send">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="email" name="emailid" placeholder="Enter your e-mail" required>
                <input type="submit" value="Submit">
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
