<?php
// Start the session to check login status
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location : login.html");
    exit();      
}
?>
<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="utf-8" />
    <title>VET</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav-icon.png" />

    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- top to return -->
    <div class="main-header-wrapper2 float_left" style="background-color: WHITE;">
        <div class="sb-header-section2 d-xl-block d-lg-block d-md-none d-sm-none d-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo-wrapper2">
                            <a href="#home"><img src="images/logok.png" style="width: 280px; padding-right:50px;" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-top-section2" style="text-align: right;">
                            <ul>
                                <li>
                                    <a href="javascript:;"><span><i class="fas fa-envelope"></i></span>kalbquittavetclinic.petsalon@gmail.com</a>
                                </li>
                                <li>
                                    <a href="javascript:;"><span><i class="far fa-clock"></i></span>+63-109-8765-432</a>
                                </li>
                                <li class="btn2">
                                    <span class="text-light">
                                        <a href="Appointment.php">Make an appointment</a>
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <div class="menu-section2">
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#contact">Contact</a></li>
                                <li class="nav-item ps-rel">
                                    <a class="nav-link" href="javascript:;">Login
                                        <span><i class="fas fa-chevron-right"></i></span>
                                    </a>
                                    <ul class="dropdown-items">
                                        <li><a href="user/login.php">User</a></li>
                                        <li><a href="admin/login.php">Admin</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu-wrapper d-xl-none d-lg-none d-md-block d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="mobile-logo">
                            <a href="#home"><img src="images/logok.png" style="width: 200px;" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex align-items-center">
                                <div class="toggle-main-wrapper mt-2" id="sidebar-toggle">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div id="sidebar">
            <div class="sidebar_logo">
                <a href="#home"><img src="images/logok.png" style="width: 250px;" alt="img"></a>
            </div>
            <div id="toggle_close">&times;</div>
            <div id="cssmenu">
                <ul class="float_left">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="has-sub">
                        <a href="javascript:;">Login</a>
                        <ul>
                            <li><a href="user/index.php">User</a></li>
                            <li><a href="admin.php">Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- BANNER -->
    <div id="home" class="banner-main-wrapper2 float_left">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <div class="container">
                        <h3>Health Care Center</h3>
                        <ul>
                            <li><a href="service.php" class="page2-btn bg-change">request an appointment</a></li>
                        </ul>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="container">
                        <h3>HEALTHY PETS <br> HAPPY HEARTS</h3>
                        <p>Schedule Your appointment today</p>
                        <ul>
                            <li><a href="appointment.php" class="page2-btn bg-change">request an appointment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            </button>
        </div>
        <div class="red-div"></div>
        <div class="white-div"></div>
    </div>

    <!-- SERVICES -->
    <div id="services" class="services-main-wrapper float_left service-bg-color" style="background-image: url('images/bg.jpg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h5 class="home1-section-heading2">
                        <img src="images/heart.png" alt="icon" style="width: 60px; vertical-align: middle;">
                        Services
                    </h5>
                </div>
                <!-- Services Cards -->
                <!-- Service card 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            
                            <h5>Deworming</h5>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- Service card 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            <h5>Immunization / Vaccination</h5>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- Service card 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            <h5>Grooming</h5>
                            <br>                            
                            <br>
                        </div>
                    </div>
                </div>
                <!-- Service card 4 -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            <h5>Whelping Assistance</h5>
                            <br>                            
                            <br>
                        </div>
                    </div>
                </div>
                <!-- Service card 5 -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            <h5>Surgery</h5>
                            <br>
                            <br>                            
                            
                        </div>
                    </div>
                </div>
                <!-- Service card 6 -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            <h5>Confinement</h5>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- TESTIMONIALS -->
    <div class="testimonial-five-wrapper padd-100 float-start w-100" style="display: flex; justify-content: center; align-items: center; padding-top: 50px; padding-bottom: 50px; background-image: url('images/bg.jpg'); background-size: cover; background-position: center;">
        <div class="container" style="max-width: 800px; text-align: center;">
            <h5 style="color: white; padding-bottom: 10px; font-weight: bold; font-size: 30px;">WHAT OUR CLIENTS HAVE TO SAY ABOUT US</h5>
            <p style="color: white; padding-bottom: 20px;font-style: italic;">It means a lot to us to know what kind of impact we're having-and we know you want to know about others' experiences with our veterinary practice, too.</p>
            <div class="testimonial-five">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer" style="border: 5px solid red; border-radius: 10px; background-color: white;">
                        <div class="owl-stage">
                            <!-- Testimonial item 1 -->
                            <div class="owl-item" style="padding:50px;">
                                <div class="test-five-wrapper">
                                    <div class="test-five-icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <h4>Panda</h4>
                                    <p>“Donec feugiat id augue consequat vulputate Suspendisse at magna mattis dignissim libero fringilla leo aiquam vehicula.ultrices fringilla est tortor sollicitudin. This is Photoshop's version of Lorem Ipsum. Proin graida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.”</p>
                                </div>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT US -->
    <div id="about" class="services-main-wrapper float_left service-bg-color" style="background-image: url('images/bg.jpg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h5 class="home1-section-heading2">
                        <img src="images/heart.png" alt="icon" style="width: 60px; vertical-align: middle;">
                        About Us
                    </h5>
                </div>
                <!-- About Us Cards -->
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            <h5>Covid-19</h5>
                            <p>It is a long established fact that a reader will be distracted by the readable the content of a page when looking.</p>
                            <a href="covid-single.php" class="button-btn mt-4 bg-white-color">Read More <span><i class="fas fa-angle-double-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            <h5>Full Stathoscope</h5>
                            <p>It is a long established fact that a reader will be distracted by the readable the content of a page when looking.</p>
                            <a href="stathoscope-single.php" class="button-btn mt-4 bg-white-color">Read More <span><i class="fas fa-angle-double-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="slider-service-section">
                        <div class="slider-box">
                            <h5>Heart Specialist</h5>
                            <p>It is a long established fact that a reader will be distracted by the readable the content of a page when looking.</p>
                            <a href="heart-specialist.php" class="button-btn mt-4 bg-white-color">Read More <span><i class="fas fa-angle-double-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding-bottom: 50px;"></div>
            <div class="banner-main-wrapper2 float_left" style="text-align: right; padding-right: 20px;">
                <ul style="display: inline-block; margin: 0;">
                    <li><a href="appointment.php" class="page2-btn bg-change">request an appointment</a></li>
                </ul>
            </div>
        </div>
    </div>

<!-- CONTACT US -->
<div id="contact" class="services-main-wrapper float_left service-bg-color" style="position: relative; background-image: url('images/image_bg.jpg'); background-size: cover; background-position: center;">
   <!-- Black overlay -->
   <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
   
   <div class="container" style="position: relative; z-index: 1;">
       <div class="row">
           <div class="col-lg-12 col-md-12">
               <h5 class="home1-section-heading2">
                   <img src="images/heart.png" alt="icon" style="width: 60px; vertical-align: middle;">
                   Contact Us
               </h5>
           </div>
       </div>
       <div style="padding-bottom: 50px;"></div>
       <div class="row">
           <!-- Left Side: Location, Email, Phone -->
           <div class="col-lg-6 col-md-6">
               <ul class="contact-info-list" style="color: white;">
                   <li>
                       <i class="fas fa-map-marker-alt"></i> <!-- Icon for location -->
                       <span>96, Bigfoot Bldg., By Pass Rd., Sta. Clara, <br> Santa Maria, 3022 Bulacan</span>
                   </li>
                   <li>
                       <i class="fas fa-envelope"></i> <!-- Icon for email -->
                       <span>kalbquittavetclinic.petsalon@gmail.com</span>
                   </li>
                   <li>
                       <i class="fas fa-phone"></i> <!-- Icon for phone -->
                       <span>+63-109-8765-432</span>
                   </li>
               </ul>
           </div>
           <!-- Right Side: Connect with Us -->
           <div class="col-lg-6 col-md-6">
               <div class="connect-with-us">
                   <h6 style="color: white; font-weight: bold; padding-bottom:20px;">Connect with us</h6>
                   <ul class="social-icons" style="list-style-type: none; padding: 0; margin: 0; display: flex; gap: 15px;">
                       <li style="display: inline-block;">
                           <a class="facebook" href="https://www.facebook.com/" target="_blank" style="color: white; font-size: 30px;">
                               <i class="fab fa-facebook-f"></i>
                           </a>
                       </li>
                       <li style="display: inline-block;">
                           <a class="instagram" href="http://www.instagram.com/" target="_blank" style="color: white; font-size: 30px;">
                               <i class="fab fa-instagram"></i>
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
</div>




    <footer>
        <div style="text-align: center; padding: 10px 10px; background-color: #004274; color: white;">
            <p>&copy; 2024 Kalb-Qitta Veterinary Clinic and Pet Salon.  </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/contact_form.js"></script>
    <script src="js/custom.js"></script>

    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        });
        wow.init();

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Testimonial Carousel
        $('.testimonial-five .owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            responsiveClass: true,
            navText: ['<i class="fas fa-arrow-left" aria-hidden="true"></i>', '<i class="fas fa-arrow-right" aria-hidden="true"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        // Hide the navigation arrows
        $('.testimonial-five .owl-nav').css('display', 'none');
    </script>


    
</body>
</html>
