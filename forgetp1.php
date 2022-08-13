<?php
include 'config.php';

error_reporting(0);

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css\logincopy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">

</head>

<body>

<img onclick="location.href='login.php'" src="images/back.png" class="logo" style="position: absolute; left: 45.5rem;height: auto; ">

    <div class="container" id="container">
        
        <div class="form-container sign-in-container">

            <form action="forgetp2.php" method="POST">
                <img onclick="location.href='index.php'"src="logo.png" class="logo">

                <h2>Forgot your password?</h2>
				<span>Please enter your email</span>
                <input type="email" placeholder="Email" name="email2" required/>
                <button name="submit2">Next</button>
            </form>
        </div>

       
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
    <script src="js\login.js"></script>

</body>

</html>
