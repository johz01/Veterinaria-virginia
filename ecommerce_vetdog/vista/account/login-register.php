<?php
  session_start();


define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'vetdog');


try {
    $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

  if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $correo = $_POST['correo'];
    
    $contra = MD5($_POST['contra']);

    if($correo == '')
      $errMsg = 'Digite su correo';
    if($contra == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
$stmt = $connect->prepare('SELECT id_due,nom_due,ape_due ,correo, correo,contra, cargo FROM owner WHERE correo = :correo');
        $stmt->execute(array(
          ':correo' => $correo
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "User $correo no encontrado.";
        }
        else {
          if($contra == $data['contra']) {

            $_SESSION['id_due'] = $data['id_due'];
            $_SESSION['nom_due'] = $data['nom_due'];
            $_SESSION['ape_due'] = $data['ape_due'];
            $_SESSION['correo'] = $data['correo'];
           
            $_SESSION['contra'] = $data['contra'];
            $_SESSION['cargo'] = $data['cargo'];
            
            
    if($_SESSION['cargo'] == 2){
          header('Location: ../shop/shop');
        
        }
            exit;
          }
          else
            $errMsg = 'Contraseña incorrecta.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
?>
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
                                            
                                             <li><a href="login-register">login register</a></li>
                                            
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
                                        <a href="login-register">
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


                                        <li><a href="../contact/contact">Contactanos</a></li>
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
                                          
                                            <li><a href="login-register">login register</a></li>
                                           
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
                                    <a href="cart.html">
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

                            

                            
                            <li><a href="../contact/contact">Contactanos</a></li>
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
                                    
                                    <li class="breadcrumb-item active" aria-current="page">login register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

         <!-- login register wrapper start -->
        <div class="login-register-wrapper pt-40 pb-40">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap">
                                <h2>Iniciar Sesión</h2>
                                <form action="#" autocomplete="off" method="POST"  role="form">
                                    <div class="single-input-item">
                                        <input type="email" name="correo" value="<?php if(isset($_POST['correo'])) echo $_POST['correo'] ?>" placeholder="Correo electrónico" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" name="contra" value="<?php if(isset($_POST['contra'])) echo MD5($_POST['contra']) ?>" placeholder="Contraseña" required />
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">

                                           

                                            <a href="#" class="forget-pwd">¿Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button name='login' type="submit" class="btn btn__bg">Iniciar Sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->

                        <!-- Register Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap sign-up-form">
                                <h2>Crear cuenta</h2>
                                
                                <form action="#" method="post" autocomplete="off" enctype="multipart/form-data">
                                    

                                     <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" name="nom_due"  placeholder="Nombre completo" required />
                                            </div>
                                        </div>

                                         <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" name="ape_due"  placeholder="Apellidos" required />
                                            </div>
                                        </div>

                                        
                                    </div>

                                    <div class="single-input-item">
                                        <input type="email" name="correo" placeholder="Correo electrónico" required />
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input name="contra" type="password" placeholder="Contraseña" required />
                                            </div>
                                        </div>

                                       
                                        
                                    </div>
                                    
                                    <div class="single-input-item">
                                        <button name="agregar" class="btn btn__bg">Crear mi cuenta</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <?php
if(isset($_POST["agregar"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vetdog";

// Creamos la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisamos la conexión
if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 
$nom_due=$_POST['nom_due'];
$ape_due=$_POST['ape_due'];
$correo=$_POST['correo'];
$contra=MD5($_POST['contra']);



// Realizamos la consulta para saber si coincide con uno de esos criterios
$sql = "select * from owner where correo='$correo'";
$result = mysqli_query($conn, $sql);
?>


<?php
 // Validamos si hay resultados
 if(mysqli_num_rows($result)>0)
 {
        // Si es mayor a cero imprimimos que ya existe el usuario
      
        if($result){
   ?>

        <script type="text/javascript">

swal("Oops...!", "Ya existe el correo a agregar!", "error")
        </script>



    <?php
    }
  
 }
 else
 {
// Si no hay resultados, ingresamos el registro a la base de datos
$sql2 = "insert into owner(nom_due,ape_due,correo,estado,contra,cargo) 
values ('$nom_due','$ape_due','$correo',1,'$contra',2)";

    

if (mysqli_query($conn, $sql2)) {
      
       if($sql2){
   ?>


        <script type="text/javascript">
swal("¡Registrado!", "¡Registrado correctamente", "success").then(function() {
            window.location = "login-register";
        });
        </script>

    <?php
    }
    else{
       ?>
       <script type="text/javascript">

        swal("Oops...!", "No se pudo guardar!", "error")
       </script>


       <?php

    }
    
} else {
      
       echo "Error: " . $sql2 . "" . mysqli_error($conn);
}

}
// Cerramos la conexión
$conn->close();

}
?>

</body>


</html>