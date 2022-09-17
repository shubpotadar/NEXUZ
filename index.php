<?php 
include 'config.php';
error_reporting(0);
session_start();

if(isset($_POST['submitopinion'])){


    if (!isset($_SESSION['name'])) {
        header("Location: login.php");
        echo    "<script type = 'text/javascript'>  
                 alert ('Please login first to comment'); 
                </script>";
        
    }

    else{
        $user=$_SESSION['user'];
        echo    "<script type = 'text/javascript'>  
                    console.log('$user'); 
                </script>";
        $user_name=$_SESSION["name"];
        $user_comment=$_POST["comment"];
        $user_role=$_POST["role"];
        $user_organization=$_POST["location"];
        $usercid=$_SESSION['userid'];
    
        $sql = "INSERT INTO user_comments (at_place, comment, name, role,usercid)
					VALUES ('$user_organization', '$user_comment','$user_name','$user_role','$usercid')";
    }
    
    
    $result = mysqli_query($conn, $sql);
}

$user_comments = mysqli_query($conn,"SELECT * FROM  user_comments c, users u where c.usercid=u.userid");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>E-learning</title>


    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css\home.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .text-muted {
            color: #fff !important;
            font-size: large;
        }

        .addcommentbutton{
            color: #dce1e6;
            background-color: #333435;
            border: 1px solid #4b4d4e;
            border-radius: 4px;
            padding: 10px 16px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            align-items: center;
            border-radius: 3em;
        }  
        
        .addcontainer#blur.active {
            filter:blur(10px);
            pointer-events:none;
            user-select:none;
        }

        #popup{
            position: fixed;
            top:40%;
            left:50%;
            transform: translate(-50%,-50%);
            width: 600px;
            height:380px;
            padding:50px;
            border-radius: 11px;
            box-shadow:0 5px 30px rgba(0,0,0,0.30);
            background:#fff;
            visibility:hidden;
            opacity: 0;
            transition:0.5s;
        }

        #popup.active{
            top:50%;
            visibility:visible;
            opacity: 1;
            transition:0.5s;
        }
        
        .projecttitle input{
            font-size:20px;
            height:35px;
            margin-bottom:20px;
            left:60%;
            /* height:30px; */
        }

        #addopinionform input{
            width:300px;
            height:38px;
            border-top-style: groove;
            border-right-style: groove;
            border-left-style: groove;
            border-bottom-style: groove;
            
        }

        #popup button{
            color:#fff;
            background: #343a40;
            border-radius: 4px;
            margin:30px;
            margin-top:40px;
            padding:4px 22px;
        }

        
    </style>
</head>

<body>
    <div class="addcontainer" id="blur">
    <header >
        <div class="container-fluid p-0 ">
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
                            <a class="nav-link hover-underline-animation" href="#">HOME
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="course2.php">COURSES</a>
                        </li>
                        <?php if(!isset($_SESSION['name'])){?>
                        <?php }else{ ?>
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
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="contact.php">CONTACT</a>
                        </li>

                        <?php if(!isset($_SESSION['name'])){?>
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

        <div class="container text-right">
            <div class="row">
                <div class="col-md-7 col-sm-12  text-black text-justify">

                    <h1 class="homeh">Learning that gets you!</h1>
                    <p>
                        Enhance you skills for the present and the future.
                    </p>
                    <button class="btn btn-dark px-5 py-2 primary-btn" onclick="location.href='#service'">
                        Get Started
                    </button>
                </div>
            </div>

        </div>
    </header>
    <!--comment-->
    <!-- service section starts  -->

    <section id="service">

        <h1 class="heading hover-underline-animation">what we offer?</h1>

        <div class="box-container">

            <div class="box" data-aos="flip-up">
                <img src="images/indian teacher.jpg"
                    alt="">
                <div class="info">
                    <h2 class="hover-underline-animation">Skilled teachers</h2>
                    <p>Online teachers prepare by learning new technologies, developing lesson plans designed for remote
                        instruction, and coming up with new ways to keep students engaged.We pride ourselves on
                        selecting teachers who exhibit wonderful skills and qualities every day. </p>
                </div>
            </div>

            <div class="box" data-aos="flip-down">
                <img src="https://images.unsplash.com/photo-1603899123005-4b772bef4f09?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                    alt="">
                <div class="info">
                    <h2 class="hover-underline-animation">Access anywhere</h2>
                    <p>By providing a training framework that is scalable and independent of time and space, you’ve
                        provided a malleable solution that will work for employees for many years to come. Mobile
                        learning has the flexibility to cater to any learner’s situation and preference. !</p>
                </div>
            </div>

            <div class="box" data-aos="flip-up">
                <img src="https://images.besttemplates.com/3697/Course-Completion-Certificate-mockup.jpg" alt="">
                <div class="info">
                    <h2 class="hover-underline-animation">Get Certified</h2>
                    <p>Certifications offer a way for you to prove to potential employers, or your current employer,
                        that you have the skills you say you do. They don't simply test what you know, but also how to
                        perform tasks and how to approach problem solving.</p>
                </div>
            </div>
                </div>

    </section>

    <!-- service section ends -->

    <!--about -->

    <section id="about">
        <div class="about-left-col">
            <img
                src="images/indian child.jpg">
        </div>
        <div class="about-right-col">
            <div class="about-text">
                <h1 class="hover-underline-animation"> About us</h1>
                <span class="spuare"> </span>
                <p>Nexuz's mission is to create new possibilities for people and organizations everywhere by connecting them to the knowledge and skills they need to succeed in a changing world of techology. Our content covers key subjects and technical topics ranging from software development and IT to design and much more.
                </p><br><br>

                <h2>"learning is not to attained by chance , it must be sought for with ardor and attened to with
                    deligigence"
                </h2>
                <h3>---Abigail Adams</h3>



            </div>
        </div>
    </section>
    <!--comment-->
    <main>
        <section class="section-2 container-fluid p-0">
            <div class="cover">
                <div class="overlay"></div>
                <div class="content text-center">
                    <h1 class="hover-underline-animation">Why choose NEXUZ</h1>
                    
                </div>
            </div>
            <div class="container-fluid text-center">
                <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
                    <div class="rect">
                        <h1>589</h1>
                        <p>happy viewers!</p>
                    </div>
                    <div class="rect">
                        <h1>50</h1>
                        <p>courses</p>
                    </div>
                    <div class="rect">
                        <h1>132</h1>
                        <p>Tutors</p>
                    </div>
                    <div class="rect">
                        <h1>1200</h1>
                        <p>hours of learning!</p>
                    </div>
                </div>
            </div>
            <!-- Some Popular Subjects -->
            <div class="title">
                <h1 class="hover-underline-animation">Popular Subjects</h1>
            </div>
            <br><br>
            <div class="course">

                <center>
                    <div class="cbox">
                        <div class="det"><a href="subjects/jee.html"><img src="images/machine-learning.png">Machine
                                learning</a></div>
                        <div class="det"><a href="subjects/gate.html"><img src="images/c++Icon.png">C++ programming</a>
                        </div>
                        <div class="det"><a href="subjects/jee.html#sample_papers"><img src="images/www.png">Web
                                development</a></div>
                        <div class="det"><a href="subjects/quiz.html"><img src="images/smartphone.png">Android
                                development</a>
                        </div>
                    </div>
                </center>
                <div class="cbox">
                    <div class="det"><a href="subjects/computer_courses.html"><img
                                src="images/online-course.png">Computer Courses</a></div>
                    <div class="det"><a href="subjects/computer_courses.html#data"><img src="images/dashboard.png">Data
                            Structures</a></div>
                    <div class="det"><a href="subjects/computer_courses.html#algo"><img
                                src="images/algorithm.png">Algorithm</a></div>
                    <div class="det det-last"><a href="subjects/computer_courses.html#projects"><img
                                src="images/development.png">Projects</a></div>
                </div>
            </div>


            <div class="purchase text-center">
                <h1 class="hover-underline-animation">Purchase the course of your choice and get going!</h1>
                <p>
                    Here is a list of our most in-demand courses at unbelievable prices!
                </p>
                <section class="course" id="course">

                    <h1 style="font: size 32px;text-align: center; font-weight: bolder; color: black ;" class="heading">
                        Top choices</h1>


                    <div= class="box-container" style="width:100%">

                        <div class="box">
                            <img src="images/python.jpg" alt="">
                            <h3 class="price">₹750</h3>
                            <div class="content">
                                <div class="stars">

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half"></i>
                                </div>
                                <a href="#" class="title">Python development</a>
                                <p>This Python Training course covers the fundamentals of Python and how to apply it to
                                    real-world
                                    applications.</p>
                                <div class="info">
                                    <h3> <i class="far fa-clock"></i> 2 hours </h3>
                                    <h3> <i class="far fa-calendar-alt"></i> 6 months </h3>
                                    <h3> <i class="fas fa-book"></i> 12 modules </h3>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <img src="images/C.png" alt="">
                            <h3 class="price">₹500</h3>
                            <div class="content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half"></i>
                                </div>
                                <a href="#" class="title">C Programming</a>
                                <p>C is a powerful and efficient language that compiles assembly code and can interact
                                    with
                                    hardware. </p>
                                <div class="info">
                                    <h3> <i class="far fa-clock"></i> 1 hours </h3>
                                    <h3> <i class="far fa-calendar-alt"></i> 3 months </h3>
                                    <h3> <i class="fas fa-book"></i> 10 modules </h3>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <img src="images/ai.jpg" alt="">
                            <h3 class="price">₹1000</h3>
                            <div class="content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                </div>
                                <a href="#" class="title">AI & ML </a>
                                <p>Understand and solve complex machine learning problems and sums with programming
                                    language
                                    skills. </p>
                                <div class="info">
                                    <h3> <i class="far fa-clock"></i> 4 hours </h3>
                                    <h3> <i class="far fa-calendar-alt"></i> 3 months </h3>
                                    <h3> <i class="fas fa-book"></i> 9 modules </h3>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <img src="images/cloud.jpg" alt="">
                            <h3 class="price">₹590</h3>
                            <div class="content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half"></i>
                                </div>
                                <a href="#" class="title">Cloud Computing</a>
                                <p>Learn Cloud Computing concepts and AWS Basics. Master AWS fundamentals and hands-on
                                    skills on
                                    Amazon Web Services (AWS)</p>
                                <div class="info">
                                    <h3> <i class="far fa-clock"></i> 3 hours </h3>
                                    <h3> <i class="far fa-calendar-alt"></i> 5 months </h3>
                                    <h3> <i class="fas fa-book"></i> 15 modules </h3>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <img src="images/js.jpg" alt="">
                            <h3 class="price">₹2550</h3>
                            <div class="content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half"></i>
                                </div>
                                <a href="#" class="title">JS Course</a>
                                <p>The Complete JavaScript Course 2022: From Zero to Expert! · JavaScript: Understanding
                                    the Weird
                                    Parts </p>
                                <div class="info">
                                    <h3> <i class="far fa-clock"></i> 3 hours </h3>
                                    <h3> <i class="far fa-calendar-alt"></i> 4 months </h3>
                                    <h3> <i class="fas fa-book"></i> 5 modules </h3>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <img src="images/css.jpg" alt="">
                            <h3 class="price">₹850</h3>
                            <div class="content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>

                                </div>
                                <a href="#" class="title">CSS development</a>
                                <p>Well organized and easy to understand Web building tutorials with lots of examples of
                                    how to use
                                    CSS.</p>
                                <div class="info">
                                    <h3> <i class="far fa-clock"></i> 4hours </h3>
                                    <h3> <i class="far fa-calendar-alt"></i> 8 months </h3>
                                    <h3> <i class="fas fa-book"></i> 7 modules </h3>
                                </div>
                            </div>
                        </div>
                </section>


                <!-- course section ends -->
                <button onclick="location.href='cart.html'" class="button-grow">Buy here</button>


                <!-- Section 4 -->
                <section class="section-4">

                    <div class="container text-center">
                        <h1 class="text-dark hover-underline-animation">What our Reader's Say about us</h1>
                        <p class="text-secondary">Read on to learn more about their experience .</p>
                    </div>

                    <div class="team row ">

                        <?php
                            while($rows=mysqli_fetch_array($user_comments)){
                                $u_name=$rows['name'];
                                $u_comment=$rows['comment'];
                                $u_role=$rows['role'];
                                $u_org=$rows['at_place']; 
                        ?>

                        <div class="col-md-4 col-12 text-center">
                            <div class="card mr-2 d-inline-block shadow-lg">
                                <div class="card-img-top">
                                <img src="uploads\<?php echo $rows['photo']; ?>" class="img-fluid border-radius p-4" alt="" style="aspect-ratio: 1/1;">
                                </div>

                                <div class="card-body">
                                    <h3 class="card-title"><?php  echo $u_name ?>  </h3>
                                    <p class="card-text">
                                        <?php echo $u_comment;
                                        ?>
                                    </p>
                                    
                                    <p class="text-black-50"><?php echo $u_role ?> at <?php echo $u_org ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        ?>




                    </div>

                </section>
                <?php if(!isset($_SESSION['name'])){?>
                        <?php }else{ ?>
                            <button  class="addcommentbutton" id="" style="padding-bottom:10px;" onclick="toggle();">+ Add my opinion</button>
                            <div style="padding-top:10px;">&nbsp;</div>
                        <?php } ?>
               

    </main>


    
    <?php
    include 'footer.php'
    ?>
    
</div>

    <div id="popup">
                <form action="#" id='addopinionform' method="POST">
                    <div class="projecttitle">
                        <label for="projecttitle" >Comment:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" id="projecttitle" name="comment" required>
                    </div>

                    <br>
                    <div class="projectdescription">
                        <label for="projectdescription">&nbsp;&nbsp;&nbsp;Role:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" id="projectdescription" name="role" required>
                    </div>
                    <br><br>
                    <div class="projectdescription">
                        <label for="projectdescription">Company/College:</label>
                        <input type="text" id="projectdescription" name="location" required>
                    </div>
                </form>

                <button type="submit" form="addopinionform" name="submitopinion">Add</button>

                <button onclick="toggle();">Cancel</button>
    </div>
    

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>

    <script src="new.js"></script>
    <script src="external.js"></script>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</body>

<script type="text/javascript">
        function toggle(){
            var blur=document.getElementById('blur');
            blur.classList.toggle('active')
            var popup=document.getElementById('popup');
            popup.classList.toggle('active')

        }
</script>