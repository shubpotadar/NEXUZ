<?php 
include 'config.php';
session_start();
$result = mysqli_query($conn,"SELECT * FROM  course_details "); 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Computer Science Courses on LearnEd</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\course2.css">
    <script type="text/javascript" src="../script.js"></script>
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


    <!-- MAIN Heading of Page -->
    <div class="title">
        <span>Computer Science Courses<br>on Nexuz</span>
        <div class="shortdesc">
            <p>Learn programming languages and concepts to prepare for a career in<br>hardware or software development
            </p>
        </div>
    </div>
    <!-- SERVICES -->
    <div class="service-swipe">
        <div class="diffSection" id="services_section">

            <p style="font-size: 50px; padding: 100px; padding-bottom: 40px; color: rgb(255, 255, 255);"
                class="hover-underline-animation">Services</p>

        </div>
        <a href="subjects/computer_courses.html">
            <div class="s-card"><img src="images/cloud.jpg">
                <p style="font-size: large; font-weight: 500;">Cloud Computing</p>
            </div>
        </a>
        <a href="subjects/jee.html">
            <div class="s-card"><img src="images/ai.jpg">
                <p style="font-size: large;font-weight: 500;">Artificial intelligence</p>
            </div>
        </a>
        <a href="#">
            <div class="s-card"><img src="images/blockchain.jpg">
                <p style="font-size: large;font-weight: 500;">Blockchain</p>
            </div>
        </a>
        <a href="subjects/jee.htm>_papers">
            <div class="s-card"><img src="images/ar.jpg">
                <p style="font-size: large;font-weight: 500;">Augumented Reality </p>
            </div>
        </a>
        <a href="#contactus_section">
            <div class="s-card"><img src="images/cyber.jpg">
                <p style="font-size: large;font-weight: 500;">Cyber Security</p>
            </div>
        </a>
        <a href="subjects/quiz.html">
            <div class="s-card"><img src="images/web.jpg">
                <p style="font-size: large;font-weight: 500;">Web development</p>
            </div>
        </a>
        <a href="#contactus_section">
            <div class="s-card"><img src="images/lang.jpg">
                <p style="font-size: large;font-weight: 500;">Programming languages</p>
            </div>
        </a>
    </div>



    <!-- Some KeyWords related to Topic -->
    <div class="course">
        <div class="cbox">
            <div class="det"><a href="#java">Java</a></div>
            <div class="det"><a href="https://developer.android.com/">Android Development</a></div>
            <div class="det"><a href="https://docs.oracle.com/javafx/2/get_started/fxml_tutorial.htm">FXML</a></div>
            <div class="det"><a href="#c++">C++</a></div>
            <div class="det"><a href="https://www.geeksforgeeks.org/introduction-of-compiler-design/">Compiler
                    Designing</a></div>
            <div class="det"><a href="https://www.coursera.org/specializations/game-design-and-development">Game
                    Development</a></div>
            <div class="det"><a href="#algo">Algorithm</a></div>
        </div>
        <div class="cbox">
            <div class="det"><a href="#python">Python</a></div>
            <div class="det"><a href="https://www.coursera.org/learn/machine-learning">Machine Learning</a></div>
            <div class="det"><a href="https://en.wikipedia.org/wiki/Artificial_intelligence">Artificial Intelligence</a>
            </div>
            <div class="det"><a href="https://en.wikipedia.org/wiki/Network">Networking</a></div>
            <div class="det"><a href="https://www.kaspersky.co.in/resource-div/definitions/what-is-cyber-security">Cyber
                    Security</a></div>
            <div class="det"><a href="https://www.eccouncil.org/ethical-hacking/">Ethical Hacking</a></div>
            <div class="det"><a href="#data">Data Structures</a></div>
        </div>
        <div class="cbox">
            <div class="det"><a href="#html_css">HTML and CSS</a></div>
            <div class="det"><a href="https://www.udacity.com/course/full-stack-web-developer-nanodegree--nd0044">Full
                    Stack Web Development</a></div>
            <div class="det"><a
                    href="https://uxplanet.org/what-is-ui-vs-ux-design-and-the-difference-d9113f6612de?gi=6d9d13f4cc95">UI
                    Designing</a></div>
            <div class="det"><a href="https://www.adobe.com/in/products/xd.html">Adobe XD</a></div>
            <div class="det"><a href="https://www.sciencedirect.com/topics/computer-science/hardware-design">Hardware
                    Designing</a></div>
            <div class="det"><a href="#javascript">JavaScript</a></div>
            <div class="det"><a href="#html_css">Bootstrap</a></div>
        </div>
    </div>



             
    <div class="gallery">
               <?php
               while($rows=mysqli_fetch_array($result)){
              ?>
        <div class="content">
            <img src="images/algorithm.png">
            <h3><?php echo $rows['coursename']; ?></h3>
            <p><?php echo $rows['descrip']; ?></p>
            <h6>₹<?php echo $rows['cost']; ?></h6>
            <ul>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
            </ul>
            <button class="fourth">Buy Now</button>
        </div>
   
         <?php 
        // close while loop 
        }?>
</div>
    <!-- PROJECTS -->
    <div class="inbt">
        <span class="hover-underline-animation">Browse Projects</span>

    </div>
    <div class="project-panel">
        <div class="project-card">
            <img src="images/lib.png">
            <div class="info">
                <h4>Digi Library</h4>
                <p>Interactive Library Management Software made using JAVA & MySQL.Start learning and take a step
                    towards being a developer!</p>
                <div class="download"><a href="https://github.com/roshan9419" target="_blank">Download</a></div>
            </div>
        </div>
        <div class="project-card">
            <img src="images/web_crawler.jpg">
            <div class="info">
                <h4>Web crawler app</h4>
                <p> Web crawler is an Internet bot that browses the WWW and is operated by search engines for Web
                    indexing.Build one using node js!</p>
                <div class="download"><a href="https://github.com/roshan9419" target="_blank">Download</a></div>
            </div>
        </div>
        <div class="project-card">
            <img src="images/photo-pj.jpg">
            <div class="info">
                <h4>Photo Gallery app</h4>
                <p>This Website helps you to manage your Personal Photos developed using HTML, CSS & JavaScript.Make
                    your customised google photos!</p>
                <div class="download"><a href="https://github.com/roshan9419" target="_blank">Download</a></div>
            </div>
        </div>
        <div class="project-card">
            <img src="images/twitter-proj.jpg">
            <div class="info">
                <h4>Sentiment analysis</h4>
                <p>This Website helps you in your analyse data using the twitter api and python.Now you can make this
                    amazing project for your portfolio!</p>
                <div class="download"><a href="https://github.com/roshan9419" target="_blank">Download</a></div>
            </div>
        </div>
        <div class="project-card">
            <img src="images/face_recognition-pj.jpg">
            <div class="info">
                <h4>Face Recognition </h4>
                <p>Face detection is a computer technology used to identify human faces in digital images.Now you can
                    build one using OpenCV.</p>
                <div class="download"><a href="https://github.com/roshan9419/smart_traffic" target="_blank">Download</a>
                </div>
            </div>
        </div>
        <div class="project-card">
            <img src="images/car-pj.jpg">
            <div class="info">
                <h4>Car pooling app</h4>
                <p>Build a car pooling multi-platform app using React Native. Learn to
                    use a back-end service like firebase and deploy to the playstore.</p>
                <div class="download"><a href="https://github.com/roshan9419/smart_traffic" target="_blank">Download</a>
                </div>
            </div>
        </div>
    </div>
    <div><button onclick="location.href='projects.html'" class="fourth" style="margin-left: 45%;">Find more..</button></div>


    <div class="head-container">
        <div class="quote" style="margin-left: 5rem;">
            <p>Collaborate on interesting projects with learners from all across the globe.</p>
            <h5>"Great things in business are never done by one person.They're done by a team of people."</h5>
            <h6><i>–-Steve Jobs</i></h6>
            <button class="fourth">Find developers</button>
        </div>
        <div class="svg-image">
            <img src="images/project.jpg" alt="svg">
        </div>
    </div>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="hover-underline-animation" style="margin-left: 3rem;font-weight: 700;">Recently Viewed
                </h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="images/react-new.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>React bootcamp</h4>
                                            <p class="item-price"><strike>₹400.00</strike> <span>₹369.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>

                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="images/ml-new.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Machine learning</h4>
                                            <p class="item-price"><strike>₹25.00</strike> <span>₹23.99</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>

                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="images/web.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Web development</h4>
                                            <p class="item-price"><strike>₹899.00</strike> <span>₹649.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>

                                                    <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="images/blockchain.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Blockchain</h4>
                                            <p class="item-price"><strike>₹315.00</strike> <span>₹250.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="images/cyber.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Cyber Security</h4>
                                            <p class="item-price"><strike>₹289.00</strike> <span>₹269.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="images/lang.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Node js and Express js</h4>
                                            <p class="item-price"><strike>₹1099.00</strike> <span>₹869.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="python-new.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Python</h4>
                                            <p class="item-price"><strike>₹109.00</strike> <span>₹99.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="images/ar.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Augmented Reality</h4>
                                            <p class="item-price"><strike>₹599.00</strike> <span>₹569.00</span></p>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
include 'footer.php'
?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>