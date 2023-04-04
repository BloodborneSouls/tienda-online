<?php
   session_start();
   require 'funciones.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UTIENDA</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/estiloAnimado.css">
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="panel/index.php">UTIENDA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-left">
            <li>
                <a href="index.php" class="btn">HOME</a>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-left">
            <li>
                <a href="" class="btn">ELECTRONICOS</a>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-left">
            <li>
                <a href="" class="btn">ROPA</a>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-left">
            <li>
                <a href="" class="btn">SERVICIOS</a>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-left">
            <li>
                <a href="" class="btn">DEPORTES</a>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-left">
            <li>
                <a href="" class="btn">VIDEOJUEGOS</a>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-left">
            <li>
                <a href="" class="btn">ACERCA DE NOSOTROS</a>
            </li>
          </ul>
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadProductos();?></span></a>
            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" id="main">
          <?php
            if(isset($_GET['id']) && is_numeric($_GET['id'])){
              $id = $_GET['id'];
              require 'vendor/autoload.php';
              $producto = new Utienda\Producto;
              $resultado = $producto->mostrarPorId($id);
            }
            ?>   
      <hr>
        Detalles del producto
      <hr>
      <div class="row">
            <div class="col-md-6 order-md-1">
            <?php
                $foto = 'upload/'.$resultado['foto'];
                if(file_exists($foto)){

                ?>
                <img src="<?php print $foto; ?>" class="img-responsive">
                <?php }else{ ?>
                SIN FOTO
                <?php }?>
            </div>
            <div class="col-md-6 order-md-2">
                <h2><?php print $resultado['nombre']?></h2>
                <h2>$<?php print $resultado['precio']?>MXN</h2>
                <p class="lead">
                  <?php print $resultado['descripcion']?>
                </p>
                <a href="carrito.php?id=<?php print $resultado['id'] ?>" class="btn btn-success btn-block">
                  <span class="glyphicon glyphicon-shopping-cart"></span> Comprar
                </a>
                <br>
                <a href="index.php" class="btn btn-danger btn-block">
                  <span class="glyphicon glyphicon-arrow-left"></span> Regresar
                </a>
            </div>
      </div>    
          
        
    </div> <!-- /container -->
       

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
  <footer>
    
  </footer>
</html>
