<?php
session_start();
$error = array();
include 'config.php';
require "mail.php";

if (!$con = mysqli_connect("localhost", "root", "", "loginnexuz")) {

	die("could not connect");
}

$mode = "enter_email";
if (isset($_GET['mode'])) {
	$mode = $_GET['mode'];
}

//something is posted
if (count($_POST) > 0) {

	switch ($mode) {
		case 'enter_email':
			
			$email = $_POST['email'];
			$_SESSION['forgetmail']=$email;
			//validate email
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error[] = "Please enter a valid email";
			} elseif (!valid_email($email)) {
				$error[] = "That email was not found";
			} else {

				$_SESSION['forgot']['email'] = $email;
				send_email($email);
				header("Location: forgot.php?mode=enter_code");
				die;
			}
			break;

		case 'enter_code':
			// code...
			$code = $_POST['code'];
			$result = is_code_correct($code);

			if ($result == "the code is correct") {

				$_SESSION['forgot']['code'] = $code;
				header("Location: forgot.php?mode=enter_password");
				die;
			} else {
				$error[] = $result;
			}
			break;

		case 'enter_password':
			// code...
			$password = $_POST['password'];
			$password2 = $_POST['password2'];

			if ($password !== $password2) {
				$error[] = "Passwords do not match";
			} elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
				header("Location: forgot.php");
				die;
			} else {

				save_password($password);
				if (isset($_SESSION['forgot'])) {
					unset($_SESSION['forgot']);
				}

				header("Location: login.php");
				die;
			}
			break;

		default:
			// code...
			break;
	}
}

function send_email($email)
{

	global $con;

	$expire = time() + (60 * 1);
	$code = rand(10000, 99999);
	$email = addslashes($email);

	$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
	mysqli_query($con, $query);

	//send email here
	send_mail($email, 'Password reset', "Your code is " . $code);
}

function save_password($password)
{

	global $con;
	$email = addslashes($_SESSION['forgot']['email']);

	$query = "update users set password = '$password' where email = '$email' limit 1";
	mysqli_query($con, $query);
}

function valid_email($email)
{
	global $con;

	$email = addslashes($email);

	$query = "select * from users where email = '$email' limit 1";
	$result = mysqli_query($con, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			return true;
		}
	}

	return false;
}

function is_code_correct($code)
{
	global $con;

	$code = addslashes($code);
	$expire = time();
	$email = addslashes($_SESSION['forgot']['email']);

	$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
	$result = mysqli_query($con, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if ($row['expire'] > $expire) {

				return "the code is correct";
			} else {
				return "the code is expired";
			}
		} else {
			return "the code is incorrect";
		}
	}

	return "the code is incorrect";
}


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Forgot</title>
	<link rel="stylesheet" href="css\logincopy.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600&display=swap" rel="stylesheet">
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
</head>

<body>
	

	<?php

	switch ($mode) {
		case 'enter_email':
			// code...
	?>
			<div class="container" id="container">
				<div class="form-container sign-in-container">

					<form method="post" action="forgot.php?mode=enter_email">
						<img onclick="location.href='index.php'" src="logo.png" class="logo">
						<h2>Forgot Password</h2>

						<span>Enter your email below</span>
						<!-- <span style="font-size: 12px;color:red;"> -->
						<?php
						foreach ($error as $err) {
							// code...
							echo $err . "<br>";
						}
						?>

						<input class="textbox" type="email" name="email" placeholder="Email"><br>
						<br style="clear: both;">
						<input type="submit" value="Next">
						<br><br>

						<div><button name="submit2"><a href="login.php" style="color: white;">Login</a></button></div>
					</form>



				</div>


			</div>
		<?php
			break;

		case 'enter_code':
			// code...
		?>

			<div class="container" id="container">
				<div class="form-container sign-in-container">
				<?php 
				$emailfor= $_SESSION['forgetmail'];
				$resultcode = mysqli_query($conn,"SELECT code FROM codes where email='$emailfor' order by id desc limit 1");
                $rsfor=mysqli_fetch_array($resultcode);
				echo "<script>alert('Your reset code is ".$rsfor['code']."')</script>";
				?>
					<form method="post" action="forgot.php?mode=enter_code">
					<img onclick="location.href='index.php'" src="logo.png" class="logo">
						<h2>Password Reset</h2>
						
						<span>Enter the code sent to your mail</span>
						
							<?php
							foreach ($error as $err) {
								// code...
								echo $err . "<br>";
							}
							?>
						

						<input class="textbox" type="text" name="code" placeholder="12345"><br>
						<br style="clear: both;">
						<input type="submit" value="Next" style="float: right;">
						<a href="forgot.php">
							<input type="button" value="Start Over">
						</a>
						<br><br>
						<!-- <div><button name="submit2"><a href="login.php" style="color: white;">Login</a></button></div> -->
					</form>
				</div>
			</div>

		<?php
			break;

		case 'enter_password':
			// code...
		?>
		<div class="container" id="container">
				<div class="form-container sign-in-container">
				<form method="post" action="forgot.php?mode=enter_password">
				<img onclick="location.href='index.php'" src="logo.png" class="logo">
				<h2>Forgot your password?</h2>
				<span>Enter the new password</span>
					<?php
					foreach ($error as $err) {
						// code...
						echo $err . "<br>";
					}
					?>
				

				<input class="textbox" type="text" name="password" placeholder="Password" required><br>
				<input class="textbox" type="text" name="password2" placeholder="Retype Password" required><br>
				<br style="clear: both;">
				<input type="submit" value="Next" style="float: right;">
				<button class="card__btn" name="submit1">start over</button>
				<br><br>
				
			</form>
				</div>
		</div>
			
	<?php
			break;

		default:
			// code...
			break;
	}

	?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
	<script src="js\login.js"></script>


</body>

</html>