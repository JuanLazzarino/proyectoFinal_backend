<?php
$error = 0;
if(!isset($_GET["id"])){     //verifico que la variable exista 
    echo "<h2>Algo salio mal, por favor vuelva a intentarlo</h2>";
    echo "<a href='./gestion_de_productos.php'><strong>Volver a la seccion de gestion de productos</strong></a>";
    $error = 1;
}
$id_productoEliminar = $_GET["id"];
if(empty($id_productoEliminar)){   //verifico que id_productoEliminar no este vacio
    if($id_productoEliminar == 0){
    $error = 1; 
    echo "Se cancelo el eliminar producto"  ; 
    header('location: gestion_de_productos.php');
    }
    else{
    echo "<h2>Algo salio mal, por favor vuelva a intentarlo</h2>";
    echo "<a href='./gestion_de_productos.php'><strong>Volver a la seccion de gestion de productos</strong></a>";
    $error = 1;
}
}

$conexion = mysqli_connect("127.0.0.1:3306","root", "", "proyecto_final");  //me conecto a la base de datos
  $query = "SELECT MAX(id_producto) as maximo FROM productos";
  $resultado = mysqli_query($conexion, $query);
  $mayor_id = mysqli_fetch_assoc($resultado);
  $maximo_id = $mayor_id ["maximo"];

if($id_productoEliminar < 1 || $id_productoEliminar > $maximo_id){
    echo "<h2>Algo salio mal, por favor vuelva a intentarlo</h2>";
    echo "<a href='./gestion_de_productos.php'><strong>Volver a la seccion de gestion de productos</strong></a>";
    $error = 1;
}
if($error == 0 ){
$query = "DELETE FROM productos WHERE id_producto = '$id_productoEliminar'";
$resultado = mysqli_query($conexion, $query);
if($resultado){
    header('location: gestion_de_productos.php');
}
}
mysqli_close($conexion);  //cerramos la conexion a la base de datos   
?>