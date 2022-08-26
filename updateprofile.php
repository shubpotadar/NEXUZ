<?php
include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $password = mysqli_real_escape_string($conn, ($_POST["password"]));
    $cpassword = mysqli_real_escape_string($conn, ($_POST["cpassword"]));

    if ($password === $cpassword) {
        $photo_name = mysqli_real_escape_string($conn, $_FILES["photo"]["name"]);
        $photo_tmp_name = $_FILES["photo"]["tmp_name"];
        $photo_size = $_FILES["photo"]["size"];
        $photo_new_name = rand() . $photo_name;

        if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {
            $sql = "UPDATE users SET name='$name', password='$password', photo='$photo_new_name' WHERE userid='{$_SESSION["userid"]}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
                move_uploaded_file($photo_tmp_name, "uploads/" . $photo_new_name);
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        }
        $_SESSION['photo'] = $photo_new_name;
        $_SESSION['name'] = $name;

    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\updateprofile.css">
    <title>Document</title>
</head>

<style>
    .card__btn {
  cursor: pointer;
  border: none;
  border-radius: 0.5rem;
  outline: none;
  background-color: #343a40;
  color: #fff;
  padding: .5rem 1rem;
  margin-top: 10px;
  margin-bottom: 20px;

}
</style>
<body>
<div id="popup">
    
    <div class="container" id="container">
        
        <div class="form-container sign-in-container">
        <div onclick="location.href='myc.php'" id="btn" style="float: right;margin-top: 20px;margin-right: 20px;font-size: 20px;position: relative;" >&#x1F5D9</div>

            <form action="" method="POST" enctype="multipart/form-data">
                
            <img onclick="location.href='index.php'"src="logo.png" class="logo">
                <h2>update Profile </h2>
                <?php
        $sql = "SELECT * FROM users WHERE userid='{$_SESSION["userid"]}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="inputBox " >
                            <input type="text" id="name" name="name" placeholder="Full Name" value="<?php echo $row['name']; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>" disabled required>
                        </div>
                        <div class="inputBox">
                            <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required>
                        </div>
                        <div class="inputBox">
                        <label for="photo">Photo</label>
                        <input type="file" accept="image/*" id="photo" name="photo" >
                    </div>
                    <img style="margin: inherit;" src="uploads/<?php echo $row["photo"]; ?>" width="100px" height="auto" alt="">

              
                <div>
                <button type="submit" name="submit" class="btn">Update Profile</button>
                </div>

                <?php
                }
            }
            ?>
            </form>
        </div>
    
       
    </div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
    <script src="js\login.js"></script>


</body>
</html>