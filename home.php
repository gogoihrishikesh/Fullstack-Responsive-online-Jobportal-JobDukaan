<?php
session_start();
include("connection.php");
include("function.php");


$query = "select * from jobs";
$result = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/img/a.png" type="image/png">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/main2.css">
    <!-- =========font=============== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>JobDukaan</title>

    <style>
        a {
            text-decoration: none;
        }

        .hero-img {
            color: #fff;
            margin-bottom: 40px;
            padding: 40px;
            border: #fff;
        }

        .hero-img a {
            color: #fff;
        }

        .hero-img a:hover {
            color: #111;
        }

        .hero-img:hover {
            background-image: linear-gradient(90deg, #1ce70a 0%, #039a24 100%);
            color: #111;
            border-radius: 50%;
            transition: 1s;
        }
    </style>
</head>

<body style="background-color: hsl(0, 2%, 11%);">
    <header class="header" id="header">
        <nav class="nav container">
            <a href="login.php" class="nav__logo"><img src="images/logoblack.png"></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="#discover" class="nav__link">Jobs</a>
                    </li>
                    <li class="nav__item">
                        <a href="login.php" class="nav__link">SignIn / SignUp</a>
                    </li>
                </ul>



                <i class="ri-close-line nav__close" id="nav-close"></i>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-function-line"></i>
            </div>
        </nav>
    </header>

    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <img src="images/jobhero2.jpg" alt="" class="home__img">

            <div class="home__container container grid">
                <div class="home__data">
                    <span class="home__data-subtitle" style=" font-family: 'Caveat', cursive; color:white;">Want to kickstart your career?</span>
                    <h3 class="home__data-title">Explore The<br> <b>Best Job<br> Opportuities</b></h3>
                    <a href="#discover" style="text-decoration: none;" class="button">Explore &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>

                </div>



            </div>
        </section>

        <!--==================== ABOUT ====================-->
        <section class=" section" id="about">
            <div class="about__container container ">
                <div class="about__data">
                    <center>
                        <h2 class="section__title ">More Information <br> About Cake & Nuts</h2>
                        <p style="color: #fff;" class="about__description">Welcome to JobDukaan, your number one source for JOBs. We're dedicated to giving you the very best of opportunity, with a focus on every sort of jobs in the market.


                            Founded in 2022 by Hrishikesh gogoi, JobDukaan has come a long way from its beginnings inTezpur. When Hrishikesh first started out, so that JobDukaan can offer you the best opportunity. We now serve customers all over India, and are thrilled that we're able to turn our passion into our own website.


                            we]hope you enjoy our service as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
                        </p>
                    </center>
                </div>


            </div>
        </section>

        <div class="bodyContent" id="discover">
            <div style="padding:3rem">
                <h2>
                    <center><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;Jobs Available</center>
                </h2>
                <br />
                <section class="women-collection pt-0" id="collection" style="margin-top: 30px;">
                    <div class="container">

                        <div class="row">
                            <?php
                            while ($row = $result->fetch_assoc()) : ?>
                                <div class="col-12 col-md-6 hero-img">
                                    <center><a style="text-decoration: none; " href="#"><img style="width: 200px; padding: 20px; align-self: center;" src="images/job.png" alt="">
                                            <div class="mt-2">
                                                <div>
                                                    <span class="text-uppercase font-weight-bold"><?php echo $row['company_name'] ?></span><br>
                                                    <span>Role : <?php echo $row['job_name']; ?></span><br>
                                                    <span>Job category: <?php echo $row['job_cat']; ?></span><br>
                                                    <span>Job description: <?php echo $row['job_desc']; ?></span><br>
                                                    <span>Job location: <?php echo $row['location']; ?></span><br>
                                                    <span>salary: <?php echo $row['salary']; ?></span><br>
                                                    <span>Experience: <?php echo $row['experience']; ?></span>

                                                </div>
                                            </div>
                                        </a><a style="margin-top:10px; text-decoration:none;" href="submit.php" class="button">Apply &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                    </center>
                                </div>
                            <?php
                            endwhile;
                            ?>


                        </div><br>

                </section>
            </div>
        </div>



        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content grid">
                    <div class="footer__data">
                        <h3 class="footer__title">JobDukaan</h3>
                        <p class="footer__description">kickstart your Career
                        </p>
                        <div>
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                                <i class="ri-facebook-box-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </div>
                    </div>

                    <div class="footer__data">
                        <h3 class="footer__subtitle">About</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">About Us</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Features</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">New & Blog</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__data">
                        <h3 class="footer__subtitle">Company</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">Team</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Plan and Pricing</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Become a member</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__data">
                        <h3 class="footer__subtitle">Support</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">FAQs</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Support Center</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer__rights">
                    <p class="footer__copy">hrishikeshgogoi &#169 All rigths reserved.</p>
                    <div class="footer__terms">
                        <a href="#" class="footer__terms-link">Terms & Agreements</a>
                        <a href="#" class="footer__terms-link">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>

      

        <!--=============== MAIN JS ===============-->
        <script src="js/mainnew.js"></script>
</body>

</html>