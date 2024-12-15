<?php
 $nombre_producto = $_POST["nombre_producto"];
 $descripcion_producto = $_POST["descripcion_producto"];
 $stock_producto = $_POST["cantidad_en_stock"];
 $precio_producto = $_POST["precio_por_unidad"];

 $imagen_producto = $_FILES["imagen_producto"];
 $type = pathinfo($imagen_producto ["name"],  PATHINFO_EXTENSION );  //obtengo la extension del archivo que necesito para poder usar BASE64
 $contenido = file_get_contents($imagen_producto["tmp_name"]);   //obtengo el contenido codificado para trandformarlo a base 64
 //ahora codifico el contenido a base 64
 $imagen_base64 = "data:image/" . $type . ";base64,". base64_encode($contenido);

 $conexion = mysqli_connect("127.0.0.1:3306","root", "", "proyecto_final");

 $query = "INSERT INTO productos (nombre_producto, descripcion_producto, stock_producto, precio_producto, imagen_producto) VALUES('".$nombre_producto."', '".$descripcion_producto."', '".$stock_producto."', '".$precio_producto."', '".$imagen_base64."')";
 $resultado = mysqli_query($conexion, $query);
  
 if($resultado){
   header('location: gestion_de_productos.php');
 }
 else{
    echo "<h2>Algo salio mal al agregar el producto, por favor vuelva a intentarlo</h2>";
 }
 mysqli_close($conexion);  //cerramos la conexion a la base de datos 

?>