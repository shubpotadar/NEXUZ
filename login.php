<?php
include 'config.php';

session_start();

if (isset($_SESSION['name'])) {
    header("Location: index.php");
}

if (isset($_POST['submit2'])) {
    $email = $_POST['email2'];
    $password = ($_POST['password2']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['photo'] = $row['photo'];
        $_SESSION['userid'] = $row['userid'];
        $usersid = $row['userid'];
        
        date_default_timezone_set("Asia/Calcutta");
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$sql4 = "INSERT INTO sessionhis (usersid, startdate, starttime) VALUES ('$usersid', '$date', '$time')";
		$result4 = mysqli_query($conn, $sql4);
        header("Location: index.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}
?>
<?php

include 'config.php';
error_reporting(0);
session_start();

if (isset($_SESSION['name'])) {
    header("Location: index.php");
}

if (isset($_POST['submit1'])) {
    $name = $_POST['name1'];
    $email = $_POST['email1'];
    $password = ($_POST['password1']);
    $cpassword = ($_POST['cpassword1']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (name, email, password)
					VALUES ('$name', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
                $username = "";
                $email = "";
                $_POST['password1'] = "";
                $_POST['cpassword1'] = "";
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css\login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600&display=swap" rel="stylesheet">

</head>

<body>

    <img onclick="location.href='index.php'" src="images/back.png" class="logo" style="position: center; left: 45.5rem;height: auto; ">

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="POST">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="name1" required />
                <input type="email" placeholder="Email" name="email1" required />
                <input type="password" placeholder="Password" name="password1" required />
                <input type="password" placeholder="Confirm Password" name="cpassword1" required />
                <span style="color:blue; font-size:15px;">

                <label for="instructor" style="font-size:16px;">Are you an instructor?</label>
                    <input type="radio" id="instructor" name="instructor" value="instructor" action="code.php" method="POST">
                    <br>

                    <?php
session_start();
$con = mysqli_connect("localhost","root","","loginnexuz");

if(isset($_POST['save_radio']))
{
    $instructor  = 1;
   

    $query = "INSERT INTO users (instructor) VALUES ($instructor)";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "test done";
        header("Location: forgot.php");
    }
    else{
        $_SESSION['status'] = "test done";
        header("Location: forgot.php");
    }
}
?>

                    <button name="submit1">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">

            <form action="#" method="POST">
                <img onclick="location.href='index.php'" src="logo.png" class="logo">

                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="https://www.facebook.com/login/" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://accounts.google.com/v3/signin/identifier?dsh=S1174539481%3A1661877671330827&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Futm_source%3Dsign_in_no_continue%26pli%3D1&ec=GAlAwAE&service=accountsettings&flowName=GlifWebSignIn&flowEntry=AddSession" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email2" required />
                <input type="password" placeholder="Password" name="password2" required />
                <span style="color:blue; font-size:15px;">
                    

                    <div><button name="submit2">Sign In</button></div>
                    <br>
                    <div><a href="forgot.php" style="color:blue; font-size:16px;">Forgot your password?</a></div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="js\login.js"></script>

</body>

</html>