<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Vetdog - Tienda de productos para tu mascota</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />

    <!-- Google fonts include -->
    <link href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800" rel="stylesheet">

    <!-- All Vendor & plugins CSS include -->
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Start Header Area -->
    <header class="header-area">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <p>Bienvenidos a nuestra nueva web</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <li class="account-settings">
                                        Mi cuenta
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list account-list">
                                            
                                           
                                            <li><a href="../account/login-register">login register</a></li>
                                           
                                        </ul>
                                    </li>
                                 

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-middle-area">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- start logo area -->
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="../tiendaonline">
                                    <img src="../../assets/img/logo/image(2).png" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- start search box area -->
                        <div class="col-lg-6">
                            <div class="search-box-wrapper">
                                <div class="search-box-inner-wrap">
                                    <form class="search-box-inner">
                                        <div class="search-field-wrap">
                                            <input type="text" class="search-field" placeholder="Más de 50.000 productos ¡encuéntralos aquí!">
                                        </div>
                                        
                                        <div class="search-select-box">
                                            
                                        </div>

                                        <div class="search-btn">
                                            <button><i class="ion-ios-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- start search box end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-3 ml-auto">
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li>
                                        <a href="#">
                                            <i class="ion-android-favorite-outline"></i>
                                            <span class="notification">0</span>
                                        </a>
                                    </li>
                                    <li class="mini-cart-wrap">
                                        <a href="../account/login-register">
                                            <i class="ion-bag"></i>
                                            <span class="notification">0</span>
                                        </a>
                                        

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- mini cart area end -->
                    </div>
                </div>
            </div>
            <!-- header middle area end -->

            <!-- main menu area start -->
            <div class="main-menu-area theme-color-2 sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="category-toggle-wrap">
                                <div class="category-toggle">
                                    <i class="ion-android-menu"></i>
                                    all categories
                                    <span><i class="ion-android-arrow-dropdown"></i></span>
                                </div>

                                <nav class="category-menu">
                                    <ul class="categories-list">
                               <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                    ?>   

                    <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                    <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>               
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="main-menu home-main">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        
                                        <li>
                                            <a href="#">perros <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><a href="#">Alimentos perros</a>
                                                    <ul>
             <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                                               
                                                        <li>
                                                            <a href="#"><?php echo $row['nomcate']; ?></a>
                                                        </li>

                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                                        
                                                    </ul>
                                                </li>

                                                <li class="mega-title"><a href="#">Cuidado e higiene</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Farmacia</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Accesorios</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>

                                            </ul>
                                        </li>

                                        
                                        <li>
                                            <a href="#">gatos <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><a href="#">Alimentos gatos</a>
                                                    <ul>
             <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                                               
                                                        <li>
                                                            <a href="#"><?php echo $row['nomcate']; ?></a>
                                                        </li>

                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                                        
                                                    </ul>
                                                </li>

                                                <li class="mega-title"><a href="#">Cuidado e higiene</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Farmacia</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Accesorios</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>

                                            </ul>
                                        </li>


                                        <li><a href="contact">Contactanos</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="contact-top">
                                <div class="contact-top-icon">
                                    <img src="../../assets/img/icon/download.png" alt="">
                                </div>
                                <div class="contact-top-info">
                                    <p>Llámanos ahora</p>
                                    <a href="#">+51 999999999</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- main menu area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-header-top">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-center">
                                    <li class="account-settings">
                                         Mi cuenta
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list account-list">
                                           
                                           
                                            <li><a href="../account/login-register">login register</a></li>
                                           
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <img src="../../assets/img/logo/image(1).png" alt="Vetdog Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="../account/login-register">
                                        <i class="ion-bag"></i>
                                        <span class="notification">0</span>
                                    </a>
                                </div>
                                <div class="mobile-menu-btn">
                                    <div class="off-canvas-btn">
                                        <i class="ion-android-menu"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-12">
                        <div class="category-toggle-wrap">
                            <div class="category-toggle">
                                <i class="ion-android-menu"></i>
                                all categories
                                <span><i class="ion-android-arrow-dropdown"></i></span>
                            </div>
                            <nav class="category-menu">
                                <ul class="categories-list">
  <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                    ?>                                 
                                    <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

   <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                  
                                    
                                </ul>
                            </nav>
                            
                        </div>
                    </div>

                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
    </header>
    <!-- end Header Area -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Más de 50.000 productos ¡encuéntralos aquí!">
                        <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                      <nav>
                        <ul class="mobile-menu">
                           
                            <li class="menu-item-has-children"><a href="#">perros</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title has-children"><a href="#">Alimentos perros</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li>
                                                <a href="#"><?php echo $row['nomcate']; ?></a>
                                            </li>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Cuidado e higiene</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>    

                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?> 
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Farmacia</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

                                             <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Accesorios</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?> 
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                     <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                        
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                            <li class="menu-item-has-children"><a href="#">gatos</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title has-children"><a href="#">Alimentos gatos</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li>
                                                <a href="#"><?php echo $row['nomcate']; ?></a>
                                            </li>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Cuidado e higiene</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>    

                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?> 
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Farmacia</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

                                             <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Accesorios</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?> 
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                     <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                        
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            

                            
                            <li><a href="contact">Contactanos</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">+51 999999999</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">vetdogg@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->



    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../tiendaonline">Home</a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">Contactanos</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
<!-- POR ACA EMPIEZA--------------------------------------------------------------------------->
<div class="contact-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h2>cuéntanos tu proyecto</h2>
                            <form id="contact-form" action="../../../external.html?link=https://template.hasthemes.com/ostromi/ostromi/assets/php/mail.php" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="first_name" placeholder="Name *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" placeholder="Phone *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email_address" placeholder="Email *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_subject" placeholder="Subject *" type="text">
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn-outline" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h2>Contactanos</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 Peru</li>
                                <li><i class="fa fa-phone"></i> vetdog@gmail.com</li>
                                <li><i class="fa fa-envelope-o"></i> +51 999999999</li>
                            </ul>
                            <div class="working-time">
                                <h3>Horas Laborales</h3>
                                <p><span>Lunes – Sabados:</span>08AM – 20PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- POR ACA TERMINA--------------------------------------------------------------------------->

       
    </main>


    <!--== Start Footer Area Wrapper ==-->
    <footer class="footer-wrapper">

        <!-- newsletter area start -->
        <div class="newsletter-area theme-color-2 pt-36 pb-36">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="newsletter-title">
                            <h3>suscríbete al boletín</h3>
                            <p>Regístrese ahora para recibir actualizaciones sobre promociones y cupones.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="newsletter-inner">
                            <form id="mc-form">
                                <input type="email" class="news-field" id="mc-email" autocomplete="off" placeholder="Enter your email address">
                                <button class="news-btn" id="mc-submit">subscribe</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter area end -->

        <!-- footer main widget area -->
        <div class="footer-widget-area bg-gray">
            <div class="container">
                <div class="row">
                    <!-- footer widget item start -->
                    <div class="col-lg-6 col-md-6">
                        <div class="fotter-widget-item">
                            <div class="footer-widget-title">
                                <div class="footer-logo">
                                    <a href="../tiendaonline">
                                        <img src="../../assets/img/logo/image(1).png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="support-widget-body">
                                <div class="support-inner">
                                    <div class="support-icon">
                                        <img src="../../assets/img/icon/support.png" alt="">
                                    </div>
                                    <div class="support-info">
                                        <h6>Llámenos al número gratuito</h6>
                                        <p>(+51)992998222 or (+51)992998222</p>
                                    </div>
                                </div>
                                <div class="footer-contact-info">
                                    <h6>Datos de contacto:</h6>
                                    <p>169-C, Technohud, Piura, PERÚ</p>
                                </div>
                                <div class="footer-contact-info footer-email">
                                    <h6>Datos de contacto:</h6>
                                    <p><a href="#">vetdogg@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer widget item end -->

                    <!-- footer widget item start -->
                    <div class="col-lg-3 col-md-3">
                        <div class="fotter-widget-item">
                            <div class="footer-widget-title">
                                <h4>Conócenos </h4>
                            </div>
                            <div class="support-widget-body">
                                <div class="usefull-links">
                                    <ul>
                                        <li><a href="#">Ventajas de vetdog</a></li>
                                      
                                        <li><a href="#">Opiniones sobre vetdog</a></li>
                                        <li><a href="#">Preguntas frecuentes</a></li>
                                        <li><a href="#">Vende en nuestro Markeplace</a></li>
                                        <li><a href="#">Blog</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer widget item end -->

                    <!-- footer widget item start -->
                    <div class="col-lg-3 col-md-3">
                        <div class="fotter-widget-item">
                            <div class="footer-widget-title">
                                <h4>Compras</h4>
                            </div>
                            <div class="support-widget-body">
                                <div class="usefull-links">
                                    <ul>
                                        <li><a href="#">Ofertas del mes</a></li>
                                        <li><a href="#">Condiciones de envio</a></li>
                                        <li><a href="#">Top marcas</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer widget item end -->
                </div>
            </div>
        </div>
        <!-- footer main widget end -->

        <!-- footer middle area start -->
        <div class="footer-middle-area bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 m-auto">
                        <div class="footer-banner-inner">
                            <!-- start single item -->
                            <div class="footer-banner-item-inner">
                                <div class="footer-banner-item">
                                    <div class="f-banner-icon">
                                        <img src="../../assets/img/icon/f-icon1.png" alt="">
                                    </div>
                                    <p class="f-banner-text">Más de 500.000 productos</p>
                                </div>
                            </div>
                            <!-- end single item -->

                            <!-- start single item -->
                            <div class="footer-banner-item-inner">
                                <div class="footer-banner-item">
                                    <div class="f-banner-icon">
                                        <img src="../../assets/img/icon/f-icon2.png" alt="">
                                    </div>
                                    <p class="f-banner-text">Mejores Precios</p>
                                </div>
                            </div>
                            <!-- end single item -->

                            <!-- start single item -->
                            <div class="footer-banner-item-inner">
                                <div class="footer-banner-item">
                                    <div class="f-banner-icon">
                                        <img src="../../assets/img/icon/f-icon3.png" alt="">
                                    </div>
                                    <p class="f-banner-text">Servicio de atención al cliente profesional</p>
                                </div>
                            </div>
                            <!-- end single item -->

                            <!-- start single item -->
                            <div class="footer-banner-item-inner">
                                <div class="footer-banner-item">
                                    <div class="f-banner-icon">
                                        <img src="../../assets/img/icon/f-icon4.png" alt="">
                                    </div>
                                    <p class="f-banner-text">Envío gratis o de bajo costo</p>
                                </div>
                            </div>
                            <!-- end single item -->
                        </div>
                    </div>
                    
                    

                </div>
            </div>
        </div>
        <!-- footer middle area end -->

        <!-- footer bottom area start -->
        <div class="footer-bottom-area bg-white">
            <div class="copyright-text">
                <p>&copy; 2021 <b>Vetdog</p>
            </div>
        </div>
        <!-- footer bottom area end -->

    </footer>
    <!--== End Footer Area Wrapper ==-->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->
    <script src="../../assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../../assets/js/active.js"></script>
</body>


</html>