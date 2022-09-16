<?php 

include 'config.php';

session_start();

$userid=$_SESSION['userid'];

date_default_timezone_set("Asia/Calcutta");
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$sql4 = "update sessionhis set startdate='$date' , starttime='$time' where usersid='$userid' ";
		$result4 = mysqli_query($conn, $sql4);

session_destroy();

header("Location: login.php");
?>