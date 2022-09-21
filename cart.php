<?php
include 'config.php';
 //code for adding product in cart
 session_start();
 $action = isset($_GET['action'])?$_GET['action']:"";
//Set variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
//Test PayPal API URL
$paypal_email = 'sb-ar7od18076071@business.example.com';
 //Add to cart
 if($action=='add' && $_SERVER['REQUEST_METHOD']=='POST') {
   

    if(!empty($_POST["quantity"])) {
    $courseid=$_GET["courseid"];
    $result=mysqli_query($conn,"SELECT * FROM course_details WHERE courseid='$courseid'");
    while($productByCode=mysqli_fetch_array($result)){
    $itemArray = array($productByCode["courseid"]=>array('coursename'=>$productByCode["coursename"], 'courseid'=>$productByCode["courseid"],'descrip'=>$productByCode["descrip"],'quantity'=>$_POST["quantity"], 'cost'=>$productByCode["cost"]));
    if(!empty($_SESSION["cart_item"])) {
        echo $productByCode['courseid'];
    // searches for specific value code
    // echo $productByCode[0]["courseid"];
    if(in_array($productByCode["courseid"],array_keys($_SESSION["cart_item"]))) {
    foreach($_SESSION["cart_item"] as $k => $v) {
    if($productByCode["courseid"] == $k) {
    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
    $_SESSION["cart_item"][$k]["quantity"] = 0;
    }
    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
    }
    }
    } else {
    //The array_merge() function merges one or more arrays into one array.
    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
    }
    } else {
    $_SESSION["cart_item"] = $itemArray;
    }
    }
    }
  
 }
 if($action=='remove' && $_SERVER['REQUEST_METHOD']=='GET') {
 if(!empty($_SESSION["cart_item"])) {
    foreach($_SESSION["cart_item"] as $k => $v) {
    if($_GET["courseid"] == $k)
    unset($_SESSION["cart_item"][$k]);
    if(empty($_SESSION["cart_item"]))
    unset($_SESSION["cart_item"]);
    }
    }
}
// // session_start();
// if (isset($_POST['courseid']) && is_numeric($_POST['courseid'])) {
//     // Set the post variables so we easily identify them, also make sure they are integer
//     $courseid = (int)$_POST['courseid'];
//     // $quantity = (int)$_POST['quantity'];
//     $quantity=1;
//     // Prepare the SQL statement, we basically are checking if the product exists in our databaser
//     // $stmt = $conn->prepare('SELECT * FROM products WHERE courseid = ?');
//     $stmt = mysqli_query($conn,"SELECT * FROM  course_details WHERE courseid = '$courseid'");
//     // $stmt->execute([$_POST['courseid']]);
//     // Fetch the product from the database and return the result as an Array
//     // $product = $stmt->fetch(PDO::FETCH_ASSOC);
//     $product=mysqli_fetch_array($stmt);
//     // Check if the product exists (array is not empty)
//     if ($product ) {
//         // Product exists in database, now we can create/update the session variable for the cart
//         if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
//             if (array_key_exists($courseid, $_SESSION['cart'])) {
//                 // Product exists in cart so just update the quanity
//                 $_SESSION['cart'][$courseid] += $quantity;
//             } else {
//                 // Product is not in cart so add it
//                 $_SESSION['cart'][$courseid] = $quantity;
//             }
//         } else {
//             // There are no products in cart, this will add the first product to cart
//             $_SESSION['cart'] = array($courseid => $quantity);
//         }
//     }
//     // Prevent form resubmission...
//     header('location: index.php?page=cart');
//     exit;
// }
// // Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
// if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
//     // Remove the product from the shopping cart
//     unset($_SESSION['cart'][$_GET['remove']]);
// }

// // Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
// // if (isset($_POST['update']) && isset($_SESSION['cart'])) {
// //     // Loop through the post data so we can update the quantities for every product in cart
// //     foreach ($_POST as $k => $v) {
// //         if (strpos($k, 'quantity') !== false && is_numeric($v)) {
// //             $id = str_replace('quantity-', '', $k);
// //             $quantity = (int)$v;
// //             // Always do checks and validation
// //             if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
// //                 // Update new quantity
// //                 $_SESSION['cart'][$id] = $quantity;
// //             }
// //         }
// //     }
// //     // Prevent form resubmission...
// //     header('location: index.php?page=cart');
// //     exit;
// // }


//     // Check the session variable for products in cart
// $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
// $products = array();
// $subtotal = 0.00;
// // If there are products in cart
// if ($products_in_cart) {
//     // There are products in the cart so we need to select those products from the database
//     // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
//     $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
//     $stmt = mysqli_query($conn,'SELECT * FROM course_details WHERE courseid IN (' . $array_to_question_marks . ')');
//     // We only need the array keys, not the values, the keys are the id's of the products
//     // $stmt->execute(array_keys($products_in_cart));
//     // Fetch the products from the database and return the result as an Array
//     $products=mysqli_fetch_array($stmt);
//     // Calculate the subtotal
//     foreach ($products as $product) {
//         $subtotal += (float)$product['cost'] * (int)$products_in_cart[$product['courseid']];
//     }
// }
// // Send the user to the place order page if they click the Place Order button, also the cart should not be empty
// if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
//     header('Location: index.php?page=placeorder');
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css\home.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css\cart.css" />



</head>

<body>
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg">

                <img src="logo.png" class="logo">
                <h2>NEXUZ</h2>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-right text-light"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link hover-underline-animation" href="index.php">HOME
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="course2.php">COURSES</a>
                        </li>
                        <li class="nav-item dropdown" id="loggedin">
                            <div class="dropdown">
                                <a href="#" class="nav-link hover-underline-animation">PROFILE</a>
                                <div class="dropdown-content">
                                    <a class="hover-underline-animation"  href="cart.php">CART</a>
                                    <a class="hover-underline-animation"   href="projects.php">PROJECTS</a>
                                    <a class="hover-underline-animation"  href="myc.php">MY COURSES</a>
                                </div>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="index.php#review">REVIEW</a>
                        </li>

                        <?php if(!isset($_SESSION['name'])){ ?>
                            <li class="nav-item"> <a class="nav-link hover-underline-animation" href="login.php">LOGIN</a></li>
                        <?php }else{ ?>
                            <li class="nav-item"> <a class="nav-link hover-underline-animation" href="logout.php">LOGOUT</a></li>
                        <?php } ?>
                        <li class="nav-item">

                            <div class=" nav-link search-box">
                                <button class="btn-search"><i class="fas fa-search"></i></button>
                                <input type="text" class="input-search" placeholder="Type to Search...">
                            </div>
                        </li>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--comment-->
    <?php
if(isset($_SESSION["cart_item"])){
$total_quantity = 0;
$total_price = 0;
?>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="p-2">
                    <h4 style="font-size: 1.5rem; font-weight: 400;" class="hover-underline-animation">SHOPPING CART
                    </h4>
                    <!-- <form action="index.php?page=cart" method="post"> -->
                    <?php
foreach ($_SESSION["cart_item"] as $item){
$item_price = $item["quantity"]*$item["cost"];
?>
                
                    <div
                        class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="images/ai.jpg" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details"><span
                                class="font-weight-bold"><?php echo $item["coursename"]; ?></span>
                            <div class="d-flex flex-row product-desc">
                                <div class="size mr-1"><span class="font-weight-bold">||&nbsp;<?php echo $item["descrip"]; ?></span></div>
                                <div class="color"><span class="font-weight-bold">&nbsp;||</span></div>
                            </div>
                        </div>

                        <div>
                            <h5 class="text-grey"><?php echo "$ ".$item["cost"]; ?></h5>
                        </div>
                        <div class="d-flex align-items-center"><a class="fa fa-trash mb-1 text-danger" href="cart.php?action=remove&courseid=<?php echo $item["courseid"]; ?>" ></a></div>
                    </div>
                    <?php
$total_quantity += $item["quantity"];
$total_price += ($item["cost"]*$item["quantity"]);

}
?>          

                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button
                            style="color:rgb(255, 255, 255); align-self: left;"
                            class="btn btn-warng btn-block btn-lg ml-2 pay-button" type="button">Payable amount :
                            <?php echo $total_price; ?></button></div>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text"
                            class="form-control border-0 gift-card" placeholder="discount code/gift card"><button
                            class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                
                            
                            
                            
                            <form action="<?php echo $paypal_url; ?>" method="post">	

			<!-- Paypal business test account email id so that you can collect the payments. -->
			<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">			
			<!-- Buy Now button. -->
			<input type="hidden" name="cmd" value="_xclick">			
			<!-- Details about the item that buyers will purchase. -->
			<input type="hidden" name="item_name" value="<?php echo $item["coursename"]; ?>">
			<input type="hidden" name="item_number" value="<?php echo $item["courseid"]; ?>">
			<input type="hidden" name="amount" value="<?php echo $item["cost"]; ?>">
				<input type="hidden" name="currency_code" value="USD">	
                <?php $_SESSION["courseid"]=$item["courseid"];
                     $_SESSION["coursename"]=$item["coursename"];
                     $_SESSION["cost"]=$item["cost"];
                 ?>	
                

			<!-- URLs -->
            <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/nexuz/success.php'>				<!-- payment button. -->
			<input type="image" name="submit" border="0"  class="btn btn-warning btn-block btn-lg ml-2 pay-button"
			src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online" align="center">
			<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >    
			</form>
                <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
        <?php
} else {
?>
<div>Your Cart is Empty</div>
        <?php
}
?>
</body>


</html>