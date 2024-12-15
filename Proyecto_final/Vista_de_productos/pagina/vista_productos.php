<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
      <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product example · Bootstrap v5.3</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="product.css" rel="stylesheet">
  </head>
 
  <body>
    
<nav class="navbar navbar-expand-md sticky-top border-bottom" data-bs-theme="dark">
  <div class="container">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="#offcanvas" aria-labelledby="#offcanvasLabel">
      <div class="offcanvas-body">
        <ul class="navbar-nav flex-grow-1 justify-content-between">
          <li class="nav-item"><a class="nav-link" href="../../Pagina_registro/registro.html">Inicio para administradores</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Robotica</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Componentes</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Diseños de pcbs</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Soluciones de problematicas</a></li>
          <li class="nav-item"><a class="nav-link" href="#">¿Quienes Somos?</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<main>
  
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center " id="presentacion">
    <div class=" col-md-6 p-lg-5 mx-auto my-5">
      <h1 class="titulo display-3 fw-bold">Componentes Electronicos</h1>
      <h3 class="titulo">Lo que necesites para tu proyecto esta aqui</h3>
      <div class="d-flex gap-3 justify-content-center lead fw-normal">
       <!-- <a class="icon-link" href="#">
          Learn more
          <svg class="bi"><use xlink:href="#chevron-right"/></svg>
        </a>
        <a class="icon-link" href="#">
          Buy
          <svg class="bi"><use xlink:href="#chevron-right"/></svg>
        </a>
      -->
      </div>
    </div>

    <div class="product-device shadow-sm d-none d-md-block" id="img-1"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block" id="img-2"></div>
  </div>

  <?php

  $conexion = mysqli_connect("127.0.0.1:3306","root", "", "proyecto_final");

  /* --------debuggin para verificar la conexion a la base de datos----------  
  if($conexion == true){
    echo "<h1>Me conecte a la base de datos</h1>";
  }
  else{
    echo "<h1>No pude conectarme a la base de datos</h1>";
  }
*/
  $query = "SELECT * FROM productos";   //creamos la query para la base de datos 
  $resultado = mysqli_query($conexion, $query);   //la asignamos a la variable $resultado el objeto con toda la informacion de nuestra tabla obtenido con la query
  
  while($unaFila = mysqli_fetch_assoc($resultado)){
    echo '
    <div>
    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorClarito">
      <div class="my-3 py-3" >
        <h2 class="display-5">'.$unaFila ["nombre_producto"].'</h2>
        <p class="lead">'.$unaFila ["descripcion_producto"].'</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 400px; border-radius: 21px 21px 0 0; ">
      <div style="text-align:center;">   
      <img src="'.$unaFila["imagen_producto"].'" width="250px"  />
      </div>
      <p style="color:  rgba(15, 122, 122); margin:15px;" >Precio:  $'.$unaFila ["precio_producto"].'</p>
      <div> 
         <button class="buttonDark" "><a href="#">Comprar</a></button>
         </div>
      </div>
    </div>
    ';
    $unaFila = mysqli_fetch_assoc($resultado);
    if(!empty($unaFila ["nombre_producto"])){
    echo '
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorOscuro" >
      <div class="my-3 p-3">
        <h2 class="display-5" >'.$unaFila ["nombre_producto"].'</h2>
        <p class="lead">'.$unaFila ["descripcion_producto"].'</p>
      </div>
     <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 400px; border-radius: 21px 21px 0 0; ">
      <div style="text-align:center;">   
      <img src="'.$unaFila["imagen_producto"].'" width="250px"  />
      </div>
      <p style="color:  rgba(15, 122, 122); margin:15px;" >Precio:  $'.$unaFila ["precio_producto"].'</p>
      <div> 
         <button class="buttonLight" "><a href="#">Comprar</a></button>
         </div>
      </div>
    </div>';
    }
   echo ' </div>
  ';
  }
  mysqli_close($conexion);

  ?>
  
<!---
  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorOscuro">
      <div class="my-3 p-3">
        <h2 class="display-5">Resistencias</h2>
        <p class="lead">100K</p>
      </div>
      <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <button class="buttonLight"><a href="#">Comprar</a></button>
      </div>
    </div>
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorClarito">
      <div class="my-3 py-3">
        <h2 class="display-5">Recistencias</h2>
        <p class="lead">1K</p>
      </div>
      <div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <button class="buttonDark"><a href="#">Comprar</a></button>
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorClarito">
      <div class="my-3 p-3">
        <h2 class="display-5">Capacitores</h2>
        <p class="lead">10uF</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <button class="buttonDark"><a href="#">Comprar</a></button>
      </div>
    </div>
    <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorOscuro">
      <div class="my-3 py-3">
        <h2 class="display-5">LM555</h2>
        <p class="lead">Ic timer</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <button class="buttonLight"><a href="#">Comprar</a></button>
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorOscuro">
      <div class="my-3 p-3">
        <h2 class="display-5">LM741</h2>
        <p class="lead">Amplificador operacional</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <button class="buttonLight"><a href="#">Comprar</a></button>
      </div>
    </div>
    <div class="me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorClarito">
      <div class="my-3 py-3">
        <h2 class="display-5">Arduino UNO</h2>
        <p class="lead">Placas de desarrollo</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <button class="buttonDark"><a href="#">Comprar</a></button>
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorClarito">
      <div class="my-3 p-3">
        <h2 class="display-5">Pulsadores NA</h2>
        <p class="lead">Pulsador normal abierto</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <button class="buttonDark"><a href="#">Comprar</a></button>
      </div>
    </div>
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden" id="colorOscuro">
      <div class="my-3 py-3">
        <h2 class="display-5">Protoboard</h2>
        <p class="lead">Plaqueta de pruebas</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <button class="buttonLight"><a href="#">Comprar</a></button>
      </div>
    </div>
  </div>---->
</main>

<footer class="container py-5">
  <div class="footerContainer">
    <h4>copyright 2024 Juan Lazzarino</h4>
  </div>
  </footer>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>