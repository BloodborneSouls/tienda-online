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
    <div class="slider">
      <ul>
          <li>
              <img src="assets/imagenes/juegos.jpg">
          </li>
          <li>
              <img src="assets/imagenes/videogames.jpg">
          </li>
          <li>
              <img src="assets/imagenes/sports.png">
          </li>
          <li>
              <img src="assets/imagenes/chica.jpg">
          </li>
          <li>
              <img src="assets/imagenes/cels.png">
          </li>
      </ul>
    </div>
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
     
        <div class="row">
            <?php
              require 'vendor/autoload.php';
              $productos = new Utienda\Producto;
              $info_productos = $productos->mostrar();
              $cantidad = count($info_productos);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_productos[$x];
            ?>
              <div class="col-md-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="text-center titulo-producto"><?php print $item['nombre'] ?></h1>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" width="200px" height="200px">
                      <?php }else{?>
                          <img src="assets/imagenes/not-found.jpg" width="35">
                      <?php }?>
                    </div>
                    <div class="panel-footer">
                        <label  class="text-center">$<?php print $item['precio']?> MXN</label>
                        <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                          <span class="glyphicon glyphicon-shopping-cart"></span> Comprar
                        </a>
                        <br>
                        <a href="detalles.php?id=<?php print $item['id'] ?>" class="btn btn-danger btn-block">
                          <span class="glyphicon glyphicon-eye-open"></span> Detalles
                        </a>
                    </div>
                  </div>
              </div>
          <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>
        </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
  <footer>
    <table class="table table-bordered center">
    <legend text-align="center">Comentarios de clientes</legend>
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Comentario</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $clientes = new Utienda\Cliente;
              $vista = $clientes->comentario();
              $comentarios = count($vista);
              if($comentarios > 0){
                $c =0;
              for($x=0; $x < $comentarios; $x++){
                $c++;
                $coment = $vista[$x];
            ?>
                <tr>
                    <td><?php print $coment['nombre_u'].' '.$coment['apellidos']?></td>
                    <td><?php print $coment['comentario']?></td>
                    <td class="text-center">
                </tr>
                <?php
                    }
                  }else{
                    ?>
                  <tr>
                    <td colspan="6">NO HAY REGISTROS</td>
                  </tr>  
                  <?php } ?>
        </tbody>
    </table>  
  </footer>
</html>
