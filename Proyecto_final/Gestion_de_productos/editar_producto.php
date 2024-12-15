<?php
if(isset($_POST["id_producto"])){
    $conexion = mysqli_connect("127.0.0.1:3306","root", "", "proyecto_final");
    if($conexion){
    $nombre_producto = $_POST["nombre_producto"];
    $descripcion_producto = $_POST["descripcion_producto"];
    $precio_producto = $_POST["precio_producto"];
    $stock_producto = $_POST["stock_producto"];
    $id_producto = $_POST["id_producto"];
    if(!empty($_FILES["imagen_producto"]["name"])){
       
     $imagen_producto = $_FILES["imagen_producto"];
     $type = pathinfo($imagen_producto ["name"],  PATHINFO_EXTENSION );  //obtengo la extension del archivo que necesito para poder usar BASE64
     $contenido = file_get_contents($imagen_producto["tmp_name"]);   //obtengo el contenido codificado para trandformarlo a base 64
     //ahora codifico el contenido a base 64
     $imagen_base64 = "data:image/" . $type . ";base64,". base64_encode($contenido); $conexion = mysqli_connect("127.0.0.1:3306","root", "", "proyecto_final");

     $query = "UPDATE productos SET nombre_producto = '".$nombre_producto."', descripcion_producto = '".$descripcion_producto."', imagen_producto = '".$imagen_base64."',stock_producto = '".$stock_producto."',precio_producto ='".$precio_producto."' WHERE id_producto = ".$id_producto;
     $resultado = mysqli_query($conexion, $query);
      
     if($resultado){
       header('location: gestion_de_productos.php');
     }
     else{
        echo "<h2>Algo salio mal al actualizar el producto, por favor vuelva a intentarlo</h2>";
     }

    }
    else{//en caso de que el usuario no halla cargado una imagen evitamos alctualizar ese campo
 
      $query = "UPDATE productos SET nombre_producto = '".$nombre_producto."', descripcion_producto = '".$descripcion_producto."',stock_producto = '".$stock_producto."',precio_producto ='".$precio_producto."' WHERE id_producto = ".$id_producto;
      $resultado = mysqli_query($conexion, $query);
       
      if($resultado){
        header('location: gestion_de_productos.php');
      }
      else{
         echo "<h2>Algo salio mal al actualizar el producto, por favor vuelva a intentarlo</h2>";
      }
    }
    mysqli_close($conexion);  //cerramos la conexion a la base de datos 
  }
}
?>