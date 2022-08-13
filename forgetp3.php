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
<style>
    .card__btn {
  cursor: pointer;
  border: none;
  border-radius: 0.5rem;
  outline: none;
  background: #7a7a7a;
  color: #fff;
  padding: .5rem 1rem;
  margin-bottom: 20px;
}
</style>
<body>

<img onclick="location.href='forgetp2.php'" src="images/back.png" class="logo" style="position: absolute; left: 45.5rem;height: auto; ">

    <div class="container" id="container">
        
        <div class="form-container sign-in-container">

            <form action="#" method="POST">
                <img onclick="location.href='index.php'"src="logo.png" class="logo">

                <h2>Forgot your password?</h2>
				<span>Enter the new password</span>
                <input type="password" placeholder="Password" name="password1" required/>
                <input type="password" placeholder="Confirm Password" name="cpassword1" required/>
                <button name="submit2">Next</button>
				<button class="card__btn" name="submit1">start over</button>
            </form>
        </div>

       
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
    <script src="js\login.js"></script>

</body>

</html>
