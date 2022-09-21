<?php
include 'config.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
 //code for adding product in cart
 session_start();
//Store transaction information into database from PayPal
$userid= $_SESSION['userid'];
$item_number = $_SESSION['courseid'];
$txn_id = $_GET['PayerID'];
$payment_gross = $_SESSION['cost'];
$currency_code = 'USD';
$payment_status = 'Completed';

//Get product price to store into database
$sql = "SELECT * FROM course_details WHERE courseid = $item_number";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset);
if(!empty($txn_id)){
    //Insert tansaction data into the database
    mysqli_query($conn, "INSERT INTO payments(userid,item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$userid."','".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");

    $resultpc=mysqli_query($conn,"SELECT paymentid FROM payments WHERE userid='$userid' order by paymentid desc limit 1");
    $rowpc = mysqli_fetch_assoc($resultpc);
    $paymentid=$rowpc['paymentid'];
    echo $paymentid;
    mysqli_query($conn, "INSERT INTO course_pay (courseid,paymentid) VALUES ('$item_number','$paymentid')");

	$last_insert_id = mysqli_insert_id($conn);  
	$_SESSION['payment_status']='Completed';
?>
	<h1>Your payment has been successful.</h1>
    <h1>Your Payment ID - <?php echo $paymentid; ?>.</h1>
<?php
}
?>
	