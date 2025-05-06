<?php
    session_start();
    
        $error = $_SESSION['error'] ?? [];
        $old = $_SESSION['old'] ?? [];
        
        unset($_SESSION['error'],$_SESSION['old']);

        

    



       


?>






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
        <title>Platanea!</title>
        <!--<< Favcion >>-->
        <link rel="shortcut icon" href="assets/img/logo/favicon.svg">
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--<< Font Awesome.css >>-->
        <link rel="stylesheet" href="assets/css/font-awesome.css">

        <?php if(!empty($error)): ?>
        <script src="/assets/js/retornarError.js"></script> 
        <?php endif ?>

        <!--<< Animate.css >>-->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!--<< Magnific Popup.css >>-->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!--<< MeanMenu.css >>-->
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <!--<< Swiper Bundle.css >>-->
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
        <!--<< Nice Select.css >>-->
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <!--<< Main.css >>-->
        <link rel="stylesheet" href="assets/css/main.css">
        <!--<< Iniciar Sesion.css >>-->
        <link rel="stylesheet" href="assets/css/loginForm.css">

        
     
    </head>
    <body>


    <?php if(empty($error)): ?>
        <!-- Proloader Start -->
        <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">                
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="P" class="letters-loading">
                    P
                    </span>
                    <span data-text-preloader="L" class="letters-loading">
                    L
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                    A
                    </span>
                    <span data-text-preloader="T" class="letters-loading">
                    T
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                    A
                    </span>
                    <span data-text-preloader="N" class="letters-loading">
                    N
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                    E
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                    A
                    </span>
                </div>
                <p class="text-center">Cargando</p>
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
        <?php endif ?>

        <!-- Offcanvas Area Start -->
        <div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="index.html">
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
                                    <img class="logo_platanea" src="assets/img/logo/logo_platanea.png" alt="logo-platanos">
                                </a>
                            </div>
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul class="d-flex gap-4 m-0">
                                        <li><a href="index.html">Inicio</a></li>
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
        
        

        <!-- Hero Section Start -->
        <section class="hero-section">
            <div class="">
                <div class="">
                    <div class="">
                        <div class="hero-2 bg-cover" style="background-image: url('assets/img/banner/banner-main.png');">
                            
                            <div class="container">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="hero-content">
                                            <p class="crujientes" data-animation="fadeInUp" data-delay="1.3s">Crujientes, sabor en cada mordida</p>
                                            <h1  data-animation="fadeInUp" data-delay="1.5s">
                                                Deliciosos
                                                platanos fritos
                                            </h1>
                                            
                                            <div class="green-button mt-5">
                                                <a href="#" class="eco-btn" data-animation="fadeInUp" data-delay="0.7s">
                                                    <span class="button-content-wrapper d-flex align-items-center">
                                                        <span class="button-text">Llévate los tuyos</span>
                                                    </span>
                                                </a>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0">
                                        <div class="burger-image" data-animation="fadeInUp" data-delay="1.4s">
                                            <img src="assets/img/hero/platanos.png" alt="chiken-img">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
          
        </section>
        

        <!-- Food Catagory Section Start -->
        <section class="food-category-section fix section-padding section-bg">
            <div class="tomato-shape">
                <img src="assets/img/shape/tomato-shape.png" alt="imagen-decorativa">
            </div>
            <div class="burger-shape-2">
                <img src="assets/img/shape/burger-shape-2.png" alt="imagen-decorativa">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-9">
                        <div class="section-title">
                            <span class="wow fadeInUp">crujiente, sabor en cada bocado</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">Comidas Populares</h2>
                        </div>
                    </div>
                    <div class="col-md-5 ps-0 col-3 text-end wow fadeInUp" data-wow-delay=".5s">
                        <div class="array-button">
                            <button class="array-prev"><i class="far fa-long-arrow-left"></i></button>
                            <button class="array-next"><i class="far fa-long-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="swiper food-catagory-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="catagory-product-card bg-cover" style="background-image: url('assets/img/shape/catagory-card-shape.jpg');">
                                <h5>5 productos</h5>
                                <div class="catagory-product-image text-center">
                                    <a href="shop.html">
                                        <img src="assets/img/food/pizza.png" alt="imagen-del-producto">
                                        <div class="decor-leaf">
                                            <img src="assets/img/shape/decor-leaf.svg" alt="imagen-decorativa">
                                        </div>
                                        <div class="decor-leaf-2">
                                            <img src="assets/img/shape/decor-leaf-2.svg" alt="imagen-decorativa">
                                        </div>
                                        <div class="burger-shape">
                                            <img src="assets/img/shape/burger-shape.png" alt="imagen-decorativa">
                                        </div>
                                    </a>
                                </div>
                                <div class="catagory-product-content text-center">
                                    <div class="catagory-product-icon">
                                        <img src="assets/img/shape/food-shape.svg" alt="texto decorativo">
                                    </div>
                                    <h3><a href="shop-single.html">Pizza Artesanal</a></h3>
                                    <p>5 productos</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="catagory-product-card bg-cover" style="background-image: url('assets/img/shape/catagory-card-shape.jpg');">
                                <h5>5 productos</h5>
                                <div class="catagory-product-image text-center">
                                    <a href="shop.html">
                                        <img src="assets/img/food/pasta.png" alt="imagen-del-producto">
                                        <div class="decor-leaf">
                                            <img src="assets/img/shape/decor-leaf.svg" alt="imagen-decorativa">
                                        </div>
                                        <div class="decor-leaf-2">
                                            <img src="assets/img/shape/decor-leaf-2.svg" alt="imagen-decorativa">
                                        </div>
                                        <div class="burger-shape">
                                            <img src="assets/img/shape/burger-shape.png" alt="imagen-decorativa">
                                        </div>
                                    </a>
                                </div>
                                <div class="catagory-product-content text-center">
                                    <div class="catagory-product-icon">
                                        <img src="assets/img/shape/food-shape.svg" alt="texto decorativo">
                                    </div>
                                    <h3><a href="shop-single.html">Pasta Italiana</a></h3>
                                    <p>5 productos</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="catagory-product-card bg-cover" style="background-image: url('assets/img/shape/catagory-card-shape.jpg');">
                                <h5>5 productos</h5>
                                <div class="catagory-product-image text-center">
                                    <a href="shop.html">
                                        <img src="assets/img/food/burger.png" alt="imagen-del-producto">
                                        <div class="decor-leaf">
                                            <img src="assets/img/shape/decor-leaf.svg" alt="imagen-decorativa">
                                        </div>
                                        <div class="decor-leaf-2">
                                            <img src="assets/img/shape/decor-leaf-2.svg" alt="imagen-decorativa">
                                        </div>
                                        <div class="burger-shape">
                                            <img src="assets/img/shape/burger-shape.png" alt="imagen-decorativa">
                                        </div>
                                    </a>
                                </div>
                                <div class="catagory-product-content text-center">
                                    <div class="catagory-product-icon">
                                        <img src="assets/img/shape/food-shape.svg" alt="texto decorativo">
                                    </div>
                                    <h3><a href="shop-single.html">Hamburguesas</a></h3>
                                    <p>5 productos</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="catagory-product-card bg-cover" style="background-image: url('assets/img/shape/catagory-card-shape.jpg');">
                                <h5>5 productos</h5>
                                <div class="catagory-product-image text-center">
                                    <a href="shop.html">
                                        <img src="assets/img/food/french-fry.png" alt="imagen-del-producto">
                                        <div class="decor-leaf">
                                            <img src="assets/img/shape/decor-leaf.svg" alt="imagen-decorativa">
                                        </div>
                                        <div class="decor-leaf-2">
                                            <img src="assets/img/shape/decor-leaf-2.svg" alt="imagen-decorativa">
                                        </div>
                                        <div class="burger-shape">
                                            <img src="assets/img/shape/burger-shape.png" alt="imagen-decorativa">
                                        </div>
                                    </a>
                                </div>
                                <div class="catagory-product-content text-center">
                                    <div class="catagory-product-icon">
                                        <img src="assets/img/shape/food-shape.svg" alt="texto decorativo">
                                    </div>
                                    <h3><a href="shop-single.html">Papas Fritas</a></h3>
                                    <p>5 productos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

   

        <!-- Choose Us Section Start -->
        <section class="choose-us fix section-padding pt-0 section-bg">
            <div class="container">
                <div class="food-icon-wrapper bg-cover" style="background-image: url('assets/img/shape/food-shape-2.png');">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="single-food-icon">
                                <div class="icon">
                                    <i class="flaticon-quality"></i>
                                </div>
                                <div class="content">
                                    <h4>comida de súper calidad</h4>
                                    <p>
                                        Un equipo apasionado creando sabores únicos y experiencias deliciosas
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                            <div class="single-food-icon">
                                <div class="icon">
                                    <i class="flaticon-cooking"></i>
                                </div>
                                <div class="content">
                                    <h4>recetas originales</h4>
                                    <p>
                                        Inspirados en la tradición, preparados con amor y creatividad en cada bocado
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                            <div class="single-food-icon">
                                <div class="icon">
                                    <i class="flaticon-fast-delivery"></i>
                                </div>
                                <div class="content">
                                    <h4>entrega rápida y puntual</h4>
                                    <p>
                                        Tus plátanos fritos llegan calientes y crujientes en tiempo récord
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                            <div class="single-food-icon">
                                <div class="icon">
                                    <i class="flaticon-quality"></i>
                                </div>
                                <div class="content">
                                    <h4>100% ingredientes frescos</h4>
                                    <p>
                                        Usamos solo plátanos de alta calidad y aceite fresco para cada pedido
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

    

        <!-- Main Cta Banner Section Start -->
        <section class="main-cta-banner section-padding pt-0">
            <div class="container">
                <div class="main-cta-banner-wrapper bg-cover mt-10" style="background-image: url('assets/img/banner/main-cta-bg.jpg');">
                    <div class="section-title">
                        <span class="theme-color-3 wow fadeInUp">crujientes, cada bocado con sabor</span>
                        <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                            Entrega rápida en <br>
                            <span class="theme-color-3">30 minutos</span> 
                        </h2>
                    </div>
                    <a href="shop-single.html" class="theme-btn bg-white mt-4 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                        <span class="button-content-wrapper d-flex align-items-center">
                            <span class="button-icon"><i class="flaticon-delivery"></i></span>
                            <span class="button-text">¡Pide tus plátanos fritos!</span>
                        </span>
                    </a>
                    <div class="arrow-shape">
                        <img src="assets/img/shape/arrow-shape.png" alt="forma">
                    </div>
                    <div class="delivery-man">
                        <img src="assets/img/domicilio.webp" alt="repartidor">
                    </div>
                    <div class="frame-shape">
                        <img src="assets/img/shape/frame.png" alt="forma">
                    </div>
                </div>
            </div>
        </section>
        

        <!-- Booking Section Start -->
        <section class="booking-section fix section-padding bg-cover" style="background-image: url('assets/img/banner/main-bg.jpg');">
            <div class="container">
                <div class="booking-wrapper style-responsive section-padding pb-0">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-12">
                            <div class="booking-content text-center">
                                <div class="section-title">
                                    <span class="wow fadeInUp">Crujiente, sabroso en cada bocado</span>
                                    <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                                        ¿Listo para disfrutar?<br>
                                        ¡Te esperamos con el mejor sabor!
                                    </h2>
                                </div>
                                <div class="icon-items d-flex justify-content-center align-items-center wow fadeInUp" data-wow-delay=".5s">
                                    <div class="icon">
                                        <i class="flaticon-phone-call-2"></i>
                                    </div>
                                    <div class="content ms-3">
                                        <h5>Atención personalizada</h5>
                                        <h3 style="color: var(--border);">+57 317 283 8188</h3>
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
                                <img class="logo_platanea" src="assets/img/logo/logo_platanea.png" alt="logo-img">
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


 <!-- Login Modal
    =========================== -->
    
    <div id="login-modal" class="modal fade oxyy-login-register" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-body p-0">
              <button type="button" class="btn-close btn-close-dark position-absolute top-0 end-0 m-2 me-sm-n4 mt-sm-n4" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="row g-0"> 
                <!-- Welcome Text
                ====================== -->
                <div class="col-lg-5 d-none d-lg-block bg-primary rounded-start">
                  <div class="row g-0 h-100">
                    <div class="col-10 col-lg-9 d-flex flex-column mx-auto">
                      <h3 class="text-white mt-5 mb-4">Iniciar Sesion</h3>
                      <p class="text-4 text-light lh-base mb-4">Mantente conectado con platanea y disfruta de sus delicias.</p>
                      <div class="mt-auto mb-4"><img class="img-fluid w-100 w-sm-40 w-md-50" src="/assets/img/shape/loginPlatano.webp" alt="Oxyy">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Welcome Text End --> 
                
                <!-- Login Form
                ====================== -->
                <div class="col-lg-7 d-flex align-items-center bg-white rounded-end">
                  <div class="container my-auto py-5">
                    <div class="row">
                      <div class="col-11 col-lg-10 mx-auto">
                        <h3 class="text-center text-4 mb-4">Iniciar Sesion</h3>
                        <div class="d-flex flex-column align-items-center mb-3">
                          
                        </div>
                        
                <!-- ACA VA EL FORM LOGING --> 
                        <form action="controllers/users/login.php" method="POST">
                          <div class="mb-3">
                            <input type="email" class="form-control border-2" id="emailAddress" name="correoUsuario" required placeholder="Ingresa tu correo">
                          </div>
                          <div class="mb-3">
                            <input type="password" class="form-control border-2" id="loginPassword" name="contrasenaUsuario" required placeholder="Ingresa tu contraseña">
                          </div>
                          <div class="row my-4">
                            <div class="col">
                              <div class="form-check">
                                <input id="remember-me" name="recuerdame" class="form-check-input" type="checkbox">
                                <label class="form-check-label text-2" for="remember-me">Recordarme</label>
                              </div>
                            </div>
                            <div class="col text-2 text-end"><a href="" data-bs-toggle="modal" data-bs-target="#forgot-password-modal" data-bs-dismiss="modal">Olvidaste tu contraseña ?</a></div>
                          </div>
                          <div class="d-grid my-4">
                        <button class="btn btn-primary" type="submit">Iniciar Sesion</button>
                        </form>
                <!-- End EL FORM LOGING --> 

                        </div>
                        
                        <p class="text-2 text-center mb-0">Eres nuevo? <a href="" data-bs-toggle="modal" data-bs-target="#register-modal" data-bs-dismiss="modal">Crear una cuenta</a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Login Form End --> 
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Login Modal End --> 


       <!-- Olvide contraseña modal -->
         
       <div id="forgot-password-modal" class="modal fade oxyy-login-register" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content border-0">
                <div class="modal-body p-0">
                  <button type="button" class="btn-close btn-close-dark position-absolute top-0 end-0 m-2 me-sm-n4 mt-sm-n4" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="row g-0"> 
          
                    <!-- Welcome Text (oculto en móvil y tablets) -->
                    <div class="col-lg-5 d-none d-lg-block bg-primary rounded-start">
                      <div class="row g-0 h-100">
                        <div class="col-10 col-lg-9 d-flex flex-column mx-auto">
                          <h3 class="text-white mt-5 mb-4">Recuperar contraseña</h3>
                          <p class="text-4 text-light lh-base mb-4">Aca podras recuperar tu contraseña atravez de tu correo.</p>
                          <div class="mt-auto mb-4">
                            <img class="img-fluid w-100 w-sm-30 w-md-50" src="/assets/img/shape/loginPlatano.webp" alt="Oxyy">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Welcome Text End -->
          
                    <!-- Forgot Form -->
                    <div class="col-12 col-lg-7 d-flex align-items-center bg-white rounded-end">
                      <div class="container my-auto py-5">
                        <div class="row">
                          <div class="col-11 col-lg-10 mx-auto">
                            <h3 class="text-center text-6 mb-4">Olvidaste tu contraseña?</h3>
                            <p class="text-center text-muted">Ingresa tu email y actualiza tu contraseña.</p>

                        <!-- Inicio form olvide --> 

                            <form id="forgotForm" class="form-border" action="controllers/users/recuperarContraseña.php" method="POST">
                              <div class="mb-3">
                                <input type="email" class="form-control border-2" id="emailAddressForgot" required placeholder="Ingresa tu correo electronico">
                              </div>
                              <div class="d-grid my-4">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                              </div>
                            </form>


                        <!-- Inicio form olvide --> 

                            <p class="text-2 text-center mb-0">
                              <a href="" data-bs-toggle="modal" data-bs-target="#login-modal" data-bs-dismiss="modal">Regresar</a>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Forgot Form End --> 
          
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Forgot Modal End -->
          
      <!-- Forgot Modal End -->


      <!-- Register Modal
    =========================== -->
    <div id="register-modal" class="modal fade oxyy-login-register" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content border-0">
            <div class="modal-body p-0">
              <button type="button" class="btn-close btn-close-dark position-absolute top-0 end-0 m-2 me-sm-n4 mt-sm-n4" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="row g-0"> 
                <!-- Welcome Text
                ====================== -->
                <div class="col-lg-5 d-none d-lg-block bg-primary rounded-start">
                  <div class="row g-0 h-100">
                    <div class="col-10 col-lg-9 d-flex flex-column mx-auto">
                      <h3 class="text-white mt-5 mb-4">Registrate</h3>
                      <p class="text-4 text-light lh-base mb-4">Queremos conocerte, ingresa tu informacion.</p>
                      <div class="mt-auto mb-4"><img class="img-fluid w-100 w-sm-40 w-md-50" src="/assets/img/shape/loginPlatano.webp" alt="Oxyy">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Welcome Text End --> 
                
                <!-- Register Form
                ====================== -->
                <div class="col-lg-7 d-flex align-items-center bg-white rounded-end">
                  <div class="container my-auto py-5">
                    <div class="row">
                      <div class="col-11 col-lg-10 mx-auto">
                        <h3 class="text-center text-4 mb-4">Crear una cuenta</h3>
                        <div class="d-flex flex-column align-items-center mb-3">
                         
                        </div>
                        
                        <!-- Inicio form registro --> 
                        <form id="signupForm"  class="form-border" action="controllers/users/registro.php" method="POST">

                        <p class="text-start text-danger"> <?php echo isset($error['datosVacio']) ? 'Enviaste datos vacios': ''; ?></p>
                            
                          <div class="mb-3 ">
                        <!-- Mostrar error por nombre de usuario --> 
                            <p class="text-start text-danger"> <?php echo isset($error['errorNombre']) ? 'Nombre invalido ': ''; ?></p>
                            <input type="text" class="form-control border-2 <?php echo isset($error['errorNombre'])? 'is-invalid':''; ?>"  id="fullNameRegistro" <?php echo isset($old['nombreUsuario']) ? 'value='. htmlspecialchars($old['nombreUsuario']).'' : '' ?>  name="nombreUsuario" required placeholder="Ingresa tu nombre">
                          </div>


                          <div class="mb-3">
                        <!-- Mostrar error por correo --> 
                            <p class="text-start text-danger"> <?php echo isset($error['errorCorreo']) ? 'Correo Invalido':''; ?></p>
                            <input type="email" class="form-control border-2 <?php echo isset($error['errorCorreo'])? 'is-invalid':''; ?>" id="emailAddressRegistro" <?php echo isset($old['correoUsuario']) ? 'value='. htmlspecialchars($old['correoUsuario']).'' : '' ?> name="correoUsuario" required placeholder="Ingresa tu correo">
                          </div>


                          <div class="mb-3">
                        <!-- Mostrar error por contraseña --> 
                            <p class="text-start text-danger"> <?php echo isset($error['errorContraseña'])?'La contraseña debe tener 8 caracteres':''; ?></p>
                            <input type="password" class="form-control border-2 <?php echo isset($error['errorContraseña'])? 'is-invalid':''; ?>" id="loginPasswordRegistro" <?php echo isset($old['contraseñaUsuario']) ? 'value='. htmlspecialchars($old['contraseñaUsuario']).'' : '' ?> name="contraseñaUsuario" required placeholder="Ingresa tu contraseña">
                          </div>
                          
                          <div class="d-grid my-4">
                            <button class="btn btn-primary" type="submit">Crear Cuenta</button>
                          </div>
                        </form>
                        <!--Fin form registro-->
                        <p class="text-2 text-center mb-0">Ya tienes una cuenta? <a href="" data-bs-toggle="modal" data-bs-target="#login-modal" data-bs-dismiss="modal">Inicia Sesion</a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Register Form End --> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Register Modal End -->






        
        <!-- Back To Top Start -->
        <div class="scroll-up">
            <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!--<< All JS Plugins >>-->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js"></script>
        <!--<< Viewport Js >>-->
        <script src="assets/js/viewport.jquery.js"></script>
        <!--<< Bootstrap Js >>-->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!--<< Nice Select Js >>-->
        <script src="assets/js/jquery.nice-select.min.js"></script>
        <!--<< Waypoints Js >>-->
        <script src="assets/js/jquery.waypoints.js"></script>
        <!--<< Counterup Js >>-->
        <script src="assets/js/jquery.counterup.min.js"></script>
        <!--<< Swiper Slider Js >>-->
        <script src="assets/js/swiper-bundle.min.js"></script>
        <!--<< MeanMenu Js >>-->
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <!--<< CountDown Js >>-->
        <script src="assets/js/countdowncustom.js"></script>
        <!--<< Magnific Popup Js >>-->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!--<< GSAP Animation Js >>-->
        <script src="assets/js/animation.js"></script>
        <!--<< Wow Animation Js >>-->
        <script src="assets/js/wow.min.js"></script>
        <!--<< Main.js >>-->
        <script src="assets/js/main.js"></script>
    </body>
</html>
