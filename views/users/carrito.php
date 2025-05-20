<!DOCTYPE html>
<html lang="en">
    <!--<< Header Area >>-->
    <head>
        <!-- ========== Meta Tags ========== -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="modinatheme">
        <meta name="description" content="Foodking - Fast Food Restaurant Html">
        <!-- ======== Page title ============ -->
        <title>Foodking - Fast Food Restaurant Html</title>
        <!--<< Favcion >>-->
        <link rel="shortcut icon" href="../img/logo/favicon.svg">
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!--<< Font Awesome.css >>-->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!--<< Animate.css >>-->
        <link rel="stylesheet" href="../css/animate.css">
        <!--<< Magnific Popup.css >>-->
        <link rel="stylesheet" href="../css/magnific-popup.css">
        <!--<< MeanMenu.css >>-->
        <link rel="stylesheet" href="../css/meanmenu.css">
        <!--<< Swiper Bundle.css >>-->
        <link rel="stylesheet" href="../css/swiper-bundle.min.css">
        <!--<< Nice Select.css >>-->
        <link rel="stylesheet" href="../css/nice-select.css">
        <!--<< Main.css >>-->
        <link rel="stylesheet" href="../css/main.css">
        <!--<< Style.css >>-->
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <!-- Proloader Start -->
        <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">                
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="F" class="letters-loading">
                    F
                    </span>
                    <span data-text-preloader="O" class="letters-loading">
                    O
                    </span>
                    <span data-text-preloader="0" class="letters-loading">
                    O
                    </span>
                    <span data-text-preloader="D" class="letters-loading">
                    D
                    </span>
                    <span data-text-preloader="K" class="letters-loading">
                    K
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                    I
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                    N
                    </span>
                    <span data-text-preloader="G" class="letters-loading">
                    G
                    </span>
                </div>
                <p class="text-center">Loading</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Offcanvas Area Start -->
        <div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="../../index.php">
                                    <img src="assets/img/logo/logo_platanea.png" alt="logo-platanos">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <p class="text d-none d-lg-block">
                            Bienvenidos al paraíso del plátano. Productos frescos, sabrosos y con mucho sabor tropical.
                        </p>
        
                        <div class="offcanvas-gallery-area d-none d-lg-block">
                            <div class="offcanvas-gallery-items">
                             
                             
                            
                            </div>
                        </div>
        
                        <div class="offcanvas__contact mt-4">
                            <h4>Contáctanos</h4>
                            <ul>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon"><i class="fal fa-map-marker-alt"></i></div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">Cartago, Colombia</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon"><i class="fal fa-envelope"></i></div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:info@platanos.com">info@platanos.com</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon"><i class="far fa-phone"></i></div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:+50680000000">+506 8000-0000</a>
                                    </div>
                                </li>
                            </ul>
        
                            <div class="header-button mt-4">
                                <a href="" data-bs-toggle="modal" data-bs-target="#login-modal" class="theme-btn me-2">
                                    <span class="button-text">Iniciar Sesión</span>
                                </a>
                                
                            </div>
        
                            <div class="social-icon d-flex align-items-center mt-3">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>

        <!-- Header Area Start -->
        <header class="section-bg">
            <div id="header-sticky" class="header-1">
                <div class="container">
                    <div class="mega-menu-wrapper">
                        <div class="header-main d-flex justify-content-between align-items-center">
                            <div class="logo">
                                <a href="index.html" class="header-logo">
                                    <img class="logo_platanea" src="../../assets/img/logo/logo_platanea.png" alt="logo-platanos">
                                </a>
                            </div>
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul class="d-flex gap-4 m-0">
                                        <li><a href="../../index.php">Inicio</a></li>
                                        <li><a href="shop.html">Tienda</a></li>
                                        <li><a href="news.html">Blog</a></li>
                                        <li><a href="contact.html">Contacto</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right d-flex align-items-center gap-3">
                              
                                <a href="" data-bs-toggle="modal" data-bs-target="#login-modal" class="theme-btn bg-red-2">Iniciar Sesión</a>
                                
                                <a href="./assets/html/shop-cart.html" class="cart-icon mx-4">
                                    <i class="far fa-shopping-basket"></i>
                                </a>
                                <div class="header__hamburger d-xl-block my-auto">
                                    <div class="sidebar__toggle">
                                        <div class="header-bar">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end header-right -->
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!--<< Breadcrumb Section Start >>-->
        <div class="breadcrumb-wrapper bg-cover" style="background-image: url('../../assets/img/banner/main-bg.jpg');">
            <div class="container">
                <div class="page-heading center">
                    <h1>shop Cart</h1>
                </div>
            </div>
        </div>

        <!--<< Sección del Carrito de Productos Inicio >>-->
<section class="cart-section section-padding fix">
    <div class="container">
        <div class="main-cart-wrapper">
            <div class="row">
                <div class="col-8">
                    <div class="cart-wrapper">
                        <div class="cart-items-wrapper">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart-item">
                                        <td class="cart-item-info">
                                            <img src="../img/shop-food/s1.png" alt="Imagen del producto">
                                        </td>
                                        <td class="cart-item-price">
                                            $ <span class="base-price">195.00</span>
                                        </td>
                                        <td>
                                            <div class="cart-item-quantity">
                                                <span class="cart-item-quantity-amount"></span>
                                                <div class="cart-item-quantity-controller">
                                                    <a href="#0" class="cart-increment">
                                                    <i class="far fa-caret-up"></i>
                                                    </a>
                                                    <a href="#0" class="cart-decrement">
                                                    <i class="far fa-caret-down"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart-item-price">
                                            $ <span class="total-price"></span>
                                        </td>
                                        <td class="cart-item-remove">
                                            <a href="#0">
                                            <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-wrapper-footer">
                            <a href="shop-cart.html" class="theme-btn border-radius-none">
                            Actualizar carrito
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="cart-pragh-box">
                        <div class="cart-graph">
                            <h4>Total del carrito</h4>
                            <ul>
                                <li>
                                    <span>Subtotal</span>
                                    <span>$320.00</span>
                                </li>
                                <li>
                                    <span>Total</span>
                                    <span>$320.00</span>
                                </li>
                            </ul>
                            <div class="chck">
                                <a href="#" class="theme-btn border-radius-none d-flex justify-content-center">
                                Realizar compra
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>   
 

          <!-- Footer Section Start -->
<footer class="footer-section fix section-bg">
   
    <div class="container">
        <div class="footer-widgets-wrapper">
            <div class="row d-flex align-items-start">
                <div class="col-xl-3 col-sm-12 col-md-6 col-lg-3 wow fadeInUp me-lg-5" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <a href="index.html">
                                <img class="logo_platanea" src="../../assets/img/logo/logo_platanea.png" alt="logo-img">
                            </a>
                        </div>
                        <div class="footer-content">
                            <p>
                                Creemos en el poder de la comida para hacer cosas increíbles.
                            </p>
                            <span>¿Interesado en trabajar con nosotros?</span> <br>
                            <div class="social-icon d-flex align-items-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-12 col-md-6 col-lg-3 wow fadeInUp ms-lg-5 ms-auto" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4>Enlaces rápidos</h4>
                        </div>
                        <ul class="list-items">
                            <li><a href="about.html"><span class="text-effect"><span class="effect-1">Servicios</span><span class="effect-1">Servicios</span></span></a></li>
                            <li><a href="about.html"><span class="text-effect"><span class="effect-1">Sobre nosotros</span><span class="effect-1">Sobre nosotros</span></span></a></li>
                            <li><a href="news-details.html"><span class="text-effect"><span class="effect-1">Noticias</span><span class="effect-1">Noticias</span></span></a></li>
                            <li><a href="team.html"><span class="text-effect"><span class="effect-1">Nuestro equipo</span><span class="effect-1">Nuestro equipo</span></span></a></li>
                            <li><a href="testimonial.html"><span class="text-effect"><span class="effect-1">Testimonios</span><span class="effect-1">Testimonios</span></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-12 col-md-6 col-lg-3 wow fadeInUp ms-lg-4" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4>Dirección:</h4>
                        </div>
                        <div class="footer-address-text">
                            <h6>
                                Cartago,<br>
                               Colombia
                            </h6>
                            <h5>Horario:</h5>
                            <h6>
                                9:30am – 6:30pm <br>
                                Lunes a Viernes
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-wrapper d-flex align-items-center justify-content-between">
                <p class="wow fadeInLeft" data-wow-delay=".3s">
                    © Copyright <span class="theme-color-3">2025</span> <a href="index.html">Platanea</a>. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </div>
</footer>

        <!-- Back To Top Start -->
        <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        
        <!--<< All JS Plugins >>-->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../js/jquery-3.7.1.min.js"></script>
        <!--<< Viewport Js >>-->
        <script src="../js/viewport.jquery.js"></script>
        <!--<< Bootstrap Js >>-->
        <script src="../js/bootstrap.bundle.min.js"></script>
        <!--<< Nice Select Js >>-->
        <script src="../js/jquery.nice-select.min.js"></script>
        <!--<< Waypoints Js >>-->
        <script src="../js/jquery.waypoints.js"></script>
        <!--<< Counterup Js >>-->
        <script src="../js/jquery.counterup.min.js"></script>
        <!--<< Swiper Slider Js >>-->
        <script src="../js/swiper-bundle.min.js"></script>
        <!--<< MeanMenu Js >>-->
        <script src="../js/jquery.meanmenu.min.js"></script>
        <!--<< Magnific Popup Js >>-->
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <!--<< GSAP Animation Js >>-->
        <script src="../js/animation.js"></script>
        <!--<< Wow Animation Js >>-->
        <script src="../js/wow.min.js"></script>
        <!--<< Main.js >>-->
        <script src="../js/main.js"></script>
    </body>
</html>