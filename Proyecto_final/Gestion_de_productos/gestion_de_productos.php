<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="gestion_de_productos.css">    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de productos</title>
</head>
<body style="overflow: scroll;">
  <div class="conteiner-boton_agregar_productos" style="  text-align:center;margin: 40px; ">
     <a href="./Agregar_productos/agregar.html" style="color: yellow; padding: 1.25em; background: black; text-align:center; text-decoration:none;">Agregar producto</a>
  </div>
  <div class="conteiner-boton_agregar_productos" style=" text-align:center;margin:25px; ">
     <a href="../Vista_de_productos/pagina/vista_productos.php" style="color: yellow; padding: 1.25em; background: black; text-align:center; text-decoration:none;">Pagina de ventas</a>
  </div>
    <div class="table-users">
        <div class="header">Productos</div>
        
        <table cellspacing="0">
           <tr>
              <th>Imagen</th>
              <th>Produtos</th>
              <th>Precio X Uni</th>
              <th>Cantidad</th>
              <th width="150">Total</th>
              <th>Acciones</th>
              <th></th>
           </tr>
   
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
             <tr>
              <td><img src="'.$unaFila["imagen_producto"].'" alt="" /></td>
              <td>'.$unaFila["nombre_producto"].'</td>
              <td> $'.$unaFila["precio_producto"].'</td>
              <td>'.$unaFila["stock_producto"].'</td>
              <td>$'.($unaFila["precio_producto"] * $unaFila["stock_producto"]).'</td>
              <td><a  onclick="eliminarProducto('.$unaFila["id_producto"].')" style="color: rgba(234,10,10); border:none; "><img src="imagenes/icono_delete.png" alt="simbolo de eliminar"></a></td>
              <td><a href="./Editar_productos/editar.php?id='.$unaFila["id_producto"].'" style="color: rgba(234,10,10); "> <img  src="imagenes/icono_editar(2).png" alt="simbolo de editar"></a></td>
            </tr>
             ';
           }
           mysqli_close($conexion);  //cerramos la conexion a la base de datos 
           ?>

     <script>
        function eliminarProducto(id_producto) {
            const confirmacion = confirm("¿Estás seguro de que deseas eliminar este producto?");
            
            if (confirmacion) {
                // Acción a realizar si el usuario confirma
                alert("Producto eliminado correctamente.");
                window.location.href = "./eliminar_producto.php?id=" + id_producto;
                // Aquí puedes agregar el código para eliminar el producto en tu lógica (por ejemplo, una llamada a la API o manipulación del DOM).
            } else {
                // Acción si el usuario cancela
                alert("Acción cancelada. El producto no ha sido eliminado.");
                window.location.href = window.location.pathname + "?id=0";
            }
        }
    </script>
        </table> 
     </div>
</body>
</html>