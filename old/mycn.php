<?php 
include 'config.php';

session_start();

if (!isset($_SESSION['userid'])) {
  header("Location: login.php");
}
$userid=$_SESSION['userid'];
$result = mysqli_query($conn,"SELECT * FROM  course_details where courseid in(select item_number from payments where userid=$userid)"); 


$projects = mysqli_query($conn,"SELECT * FROM  project p, project_taken pt where p.project_id=pt.project_id");


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>MY COURSES</title>


  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css\home.css">
  <link rel="stylesheet" href="css\myyc.css">



</head>

<body >

  <header>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg">

        <img src="logo.png" class="logo">
        <h2>NEXUZ</h2>

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
 <li class="nav-item dropdown">
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
              <a class="nav-link hover-underline-animation" href="contact.php">CONTACT</a>
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
  
  <div class="containerd">
    <div class="card">
      <div class="content">
        <div class="imgBx">
          <img src="uploads\<?php echo $_SESSION['photo']; ?>" alt="Avatar" />
        </div>
        <h2 style="font-weight: bold;"><?php echo $_SESSION['name']; ?><br /><span><?php echo $_SESSION['email']; ?></span></h2>
      </div>
      <ul class="navigation">
        <li>
          <a onclick="location.href='updateprofile.php'"><i class="far fa-user" ></i>Edit Profile</a>
        </li>
        <li>
          <a href="projects.php"><i class="far fa-comment-alt"></i>Projects</a>
        </li>
          <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </li>
      </ul>
      <div class="togg">
        <i class="fas fa-chevron-down"></i>
      </div>
    </div>

    <h2 style="text-align:center; padding-top: 4rem;">Recommendation</h2>
    <div class="reviewcard">
      <div class="propicbox"><img src="https://preview.checchiadesign.com/code/reviewcard/img/foto.jpg" class="propic">
      </div>

      <div class="reviewerbox">
        <h4><a href="https://www.facebook.com/checchiadesign/" class="reviewername" target="_blank">Chris Adam
            &nbsp</a> <img src="https://preview.checchiadesign.com/code/reviewcard/img/review-icon.png" width="20px">

      </div>

      <p class="review">I'm very passionate about MERN stack development and would be glad to collaborate with teams and
        people from across the globe to create viable efficient solutions to real world problems.</p>
    </div>
    <div class="reviewcard">
      <div class="propicbox"><img
          src="images/person.jpg"
          class="propic">
      </div>

      <div class="reviewerbox">
        <h4><a href="https://www.facebook.com/checchiadesign/" class="reviewername" target="_blank">Cilia Nick
            &nbsp</a> <img src="https://preview.checchiadesign.com/code/reviewcard/img/review-icon.png" width="20px">

      </div>

      <p class="review">I'm an enthusiastic open source contributor with an experience of 3 years. I would like to
        connect with interested peers and work on projects that can be accessible to all the people free of cost by
        building cutting-edge tech.</p>
    </div>
  </div>



  <div class="listc">
    <h2 style="margin-bottom: 2rem; margin-left: 2.5rem; font-size: 25px;font-weight: bold;">Courses</h2>

               <?php
               while($rows=mysqli_fetch_array($result)){
              ?>
    <div class="card" style="background-image: url(images/javascript.png);">
      <div class="html">
        <div class="card__content">
          <h2 class="card__heading"><?php echo $rows['coursename']; ?></h2>
          <p class="card__body"><?php echo $rows['descrip']; ?></p>
          <div class="bar">
            <div class="progress"></div>
            <h6 style="padding-top: 8px;text-align: right;font-size: 11px;">70%</h6>
          </div>
          <button class="card__btn" onclick="location.href='content.php'" >Continue</button>

        </div>
      </div>
    </div>
<?php 
        // close while loop 
        }?>
  
    <h2 style="margin-bottom: 2rem; margin-left: 2.5rem; font-size: 25px;font-weight: bold;">Projects</h2>

    <?php
               while($rowproj=mysqli_fetch_array($projects)){
              ?>



    <div class="card" style="background-image: url(images/lib.png);">
      <div class="python">
        <div class="card__content">
          <h2 class="card__heading"><?php echo $rowproj['project_name']; ?></h2>
          <p class="card__body"> <?php echo $rowproj['description']; ?></p>
          <div class="bar">
            <div class="progress"></div>
            <h6 style="padding-top: 8px;text-align: right;font-size: 11px;">20%</h6>
          </div>
          <button class="card__btn">Continue</button>
        </div>
      </div>
    </div>
    <?php 
        // close while loop 
        }?>
    <!-- <div class="card" style="background-image: url(images/insta.png);">
      <div class="cloud">
        <div class="card__content">
          <h2 class="card__heading">Instagram clone using React Native</h2>
          <p class="card__body">Our pre-built social media app software that helps entrepreneurs to
            build an Instagram-like app with unique features like creation of price-locked exclusive posts.
          </p>
          <div class="bar">
            <div class="progress"></div>
            <h6 style="padding-top: 8px;text-align: right;font-size: 11px;">90%</h6>
          </div>


          <button class="card__btn">Continue</button>

        </div>
      </div>
    </div>

    <div class="card" style="background-image: url(images/dev.png);">
      <div class="js">
        <div class="card__content">
          <h2 class="card__heading">Airline reservation system using Java</h2>
          <p class="card__body">A web-based Java project which is a
            comprehensive passenger processing system that includes inventory and online
            transactions with realtime updations.</p>
          <div class="bar">
            <div class="progress"></div>
            <h6 style="padding-top: 8px;text-align: right;font-size: 11px;">50%</h6>
          </div>


          <button class="card__btn">Continue</button>

        </div>
      </div>
    </div>
    <div class="card" style="background-image: url(images/algorithm.png);">
      <div class="react">
        <div class="card__content">
          <h2 class="card__heading">BSTs-memoization algorithm</h2>
          <p class="card__body">Memoization related to dynamic programming. In reduction-memoizing BSTs, each node can
            memoize a function of its subtrees. </p>
          <div class="bar">
            <div class="progress"></div>
            <h6 style="padding-top: 8px;text-align: right;font-size: 11px;">78%</h6>
          </div>


          <button class="card__btn">Continue</button>

        </div>
      </div>
    </div>
  </div> -->
  <!--   -->

  <div class="containerr">
   <h2 style="margin-bottom: 2rem; margin-left: 2.5rem; font-size: 25px; font-weight: bold;">Socialize</h2>
    <div class="card_row">
      <div class="card_image">
        <img
          src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fHByb2Zlc3Npb25hbHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60"
          alt="image">
      </div>
      <div class="card_details">
        <h1>Nishka Rajan</h1>

        <div class="bar1">
          <div class="progress1" id="per1"></div>
        </div>
        <h6>70%</h6>
        <p>
          UI/UX Developer
        </p>
      </div>
    </div>
    <div class="card_row">
      <div class="card_image">
        <img
          src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTl8fG1hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
          alt="image">
      </div>
      <div class="card_details">
        <h1>John Smith</h1>

        <div class="bar1">
          <div class="progress1" id="per2"></div>
        </div>
        <h6>50%</h6>
        <p>
          Android developer
        </p>
      </div>
    </div>
    <div class="card_row">
      <div class="card_image">
        <img
          src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cHJvZmVzc2lvbmFsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60"
          alt="image">
      </div>
      <div class="card_details">
        <h1>Ziva Tripathi</h1>

        <div class="bar1">
          <div class="progress1" id="per3"></div>
        </div>
        <h6>20%</h6>
        <p>
          Cloud Architect
        </p>
      </div>
    </div>
    <div class="card_row">
      <div class="card_image">
        <img
          src="https://images.unsplash.com/photo-1556157382-97eda2d62296?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fHByb2Zlc3Npb25hbHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60"
          alt="image">
      </div>
      <div class="card_details">
        <h1>Jim Brown</h1>

        <div class="bar1">
          <div class="progress1" id="per4"></div>
        </div>
        <h6>35%</h6>
        <p>
          Backend developer
        </p>
      </div>
    </div>
    <div class="card_row">
      <div class="card_image">
        <img src="images/5.jpg" alt="image">
      </div>
      <div class="card_details">
        <h1>Mike Blanc</h1>

        <div class="bar1">
          <div class="progress1" id="per5"></div>
        </div>
        <h6>10%</h6>
        <p>
          Data analyst
        </p>
      </div>
    </div>


  </div>

  <?php
include 'footer.php'
?>

 
   
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js\script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>

</html>