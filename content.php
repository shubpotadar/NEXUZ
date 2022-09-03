<?php 
include 'config.php';
session_start();
$result = mysqli_query($conn,"SELECT * FROM  course_details "); 
?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="css\style.css" />
    <title>course</title>
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



    <div class="main">
    <video id="videoplaylist" autoplay  tabindex="0" controls>
      <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"/>
    </video>
    <div class="vl"></div>
<div class="play">
    <ul id="playlist">
      <li class="active">
        <a
          href="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"
        >
          BigBuckBunny
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream1
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream2
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream3
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream4
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream5
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream6
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream7
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream8
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream9
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream10
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream11
        </a>
      </li>
      <li>
        <a
          href="https://res.cloudinary.com/shubpotadar/video/upload/v1661664141/samples/cld-sample-video.mp4"
        >
          ElephantsDream12
        </a>
      </li>

    </ul>
</div>
</div>
<?php
    include 'footer.php'
    ?>
  </body>
  <script src="js\scriptc.js"></script>
</html>
