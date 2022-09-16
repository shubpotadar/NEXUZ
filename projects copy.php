
<?php
include 'config.php';

session_start();

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
  }

if(isset($_POST['submitproj'])){
    $proj_name=$_POST["project_title"];
    $proj_desc=$_POST["project_description"];
    $userpid=$_SESSION['userid'];
    $sql = "INSERT INTO project (project_name, description,userpid)
					VALUES ('$proj_name', '$proj_desc','$userpid')";
    
    $result = mysqli_query($conn, $sql);
}

if (isset($_POST['submitp'])) {
    $userpid=$_SESSION['userid'];
    $proj_id=$_POST["submitp"];
    $sql = "SELECT * FROM project_taken WHERE project_id='$proj_id' and userid='$userpid'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO project_taken (project_id,userid) VALUES ('$proj_id','$userpid')";
        $resultp = mysqli_query($conn, $sql);
        echo "<script>alert('Enrolled into project.')</script>";
          
    } else {
        echo "<script>alert('Already enrolled into the project.')</script>";
    }
} 

   

$resultproject = mysqli_query($conn,"SELECT * FROM  project ");
?>


<!DOCTYPE html>
<html backgrlang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Project</title>

    <link rel='stylesheet' href='css\projects.css'>

    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <link ref="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"
          />

    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <link
          href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap"
          rel="stylesheet"
          />

    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <link
          href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap"
          rel="stylesheet"
          />
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title> 
</head>

<body>
    <div class='main-container'>
        <div class='container' id='blur'>
            <div class='left-sidebar'>
                <h2>Dashboard</h2>
                <div>
                    <ion-icon id="add" name="add-circle"></ion-icon>
                    <a class='top-left-sidebar-link' href='#' onclick="toggle();">Add Project</a>
                </div>
                <div>
                    <ion-icon name="home-outline"></ion-icon>
                    <a class='left-sidebar-links' href='index.php'>Home</a>
                </div>
                <div>
                    <ion-icon name="settings-outline"></ion-icon>
                    <a class='left-sidebar-links' href='myc.php'>Profile</a>
                </div>
                <div>
                    <ion-icon name="person-outline"></ion-icon>
                    <a class='left-sidebar-links' href='logout.php'>Logout</a>
                </div>
                <a href="index.php"><img src="logo.png" class="logo"></a>
                <h3>NEXUZ</h3>
                <img onclick="location.href='index.php'" src="images/back.png" class="logo" style="position: relative; height: auto; top: -3rem; left: 3rem;">
            </div>

            <div class='dashboard'>

                <div class='top-bar'>
                    <br>
                    <input placeholder="SEARCH" type='search'>
                    <ion-icon class='search-icon' name="search-outline"></ion-icon>
                </div>

                <h2>Projects</h2>
                <br>

                <div class='box-container'>

                <?php
               while($rows=mysqli_fetch_array($resultproject)){
                $var=$rows['userpid'];
               $ruser = mysqli_query($conn,"SELECT * FROM users where userid =$var");
               $rowuser=mysqli_fetch_array($ruser);
            ?>

                    <div class='box'>
                        <div class='box-row'>
                            <a href="https://imgur.com/FYf3Cvl"><img src="images/ps.png" title="source: imgur.com" /></a>
                            <p><?php echo $rows['project_name']; ?></p>
                        </div>
                        <p><?php echo $rows['description']; ?></p>
                        <div class='line'></div>
                        <div class='buttons-container'>
                           
                        <form action="#" method="POST">
                        <button class='buttons' value="<?php echo $rows['project_id']; ?>" name="submitp">Join</button>          
                        </form>



                            </div>
                            <p style="text-align: center; margin: 9px 0px 0px 0px;">By : <?php echo $rowuser['name']; ?></p>
                    </div> 
                    <?php 
        // close while loop 
        }?>
                </div>
            </div>

        </div>

        <div id="popup">
                <form action="#" id='addprojectform' method="POST">
                    <div class="projecttitle">
                        <label for="projecttitle" >Project Name</label>
                        <input type="text" id="projecttitle" name="project_title" required> 
                    </div>
                    <br>
                    <div class="projectdescription" style="position:relative; top:-18px;">
                        <label style="position:relative; top:-18px;" for="projectdescription">Description</label>
                        <textarea style="position:relative; left:44px" id="projecttitle" name="project_description" rows="3" cols="55" required></textarea>
                    </div>
                    <div class="teammembers"   for="projectdescription" >
                        <label style="position:relative; top:-18px; " for="projectdescription">Members</label>
                        <textarea  id="projecttitle" style="position:relative; left:57px" name="project_description" rows="3" cols="55" required></textarea>
                    </div>
                </form>

                <button id="btn" type="submit" form="addprojectform" name="submitproj">Add</button>

                <button id="btn" onclick="toggle();">Cancel</button>
        </div>

        <script type="text/javascript">
            function toggle(){
                var blur=document.getElementById('blur');
                blur.classList.toggle('active')
                var popup=document.getElementById('popup');
                popup.classList.toggle('active')

            }
        </script>
    </div>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
      

</body>
    
    
</html>
