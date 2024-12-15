<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>formulario para editar productos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
        <?php

		$id_producto = $_GET ["id"];
		$conexion = mysqli_connect("127.0.0.1:3306","root", "", "proyecto_final");
		$query = "SELECT * FROM productos WHERE id_producto = ".$id_producto;
		$resultado = mysqli_query($conexion,$query);
		$unaFila = mysqli_fetch_assoc($resultado);
		
	echo '<div class="wrapper">
		<div class="inner">
			<form method="post" action="../editar_producto.php" enctype="multipart/form-data">
			<input type="hidden" value="'.$id_producto.'"class="form-control" id="id_producto" name="id_producto" required>
				<h3>Editar producto</h3>
				<p>Modifica los campos que quieras actualizar</p>
				<label class="form-group" for="nombre_producto">
					<input type="text" value="'.$unaFila["nombre_producto"].'"class="form-control" id="nombre_producto" name="nombre_producto" required>
					<span>Nombre producto</span>
					<span class="border"></span>
				</label>
				<label class="form-group" for="descripcion_producto">
					<textarea name="descripcion_producto" id="descripcion_producto" class="form-control" required>'. $unaFila["descripcion_producto"].'</textarea>
					<span for="">Descripcion</span>
					<span class="border"></span>
				</label>
				<label class="form-group" for="precio_por_unidad">
					<input type="number" value="'.$unaFila["precio_producto"].'" class="form-control" name="precio_producto" id="precio_producto" required>
					<span for="">Precio por unidad</span>
					<span class="border"></span>
				</label>
				<label class="form-group" for="cantidad_en_stock" >
					<input type="number" value="'.$unaFila["stock_producto"].'" name="stock_producto" id="stock_producto" class="form-control" required></input>
					<span for="">Cantidad en stock</span>
					<span class="border"></span>
				</label>
				<p>Editar Imagen del producto</p>
				<label class="form-group" for="imagen">
					<input  class="form-control" type="file" name="imagen_producto" id="imagen_producto" >
					<span class="border"></span>
				</label>
				<div style=" text-align:center; ">
				<img src="'.$unaFila["imagen_producto"].'" width="130px" heigth="80px">
			    <p>imagen actual</p>
				</div>
				<button type="submit">Editar
					<i class="zmdi zmdi-arrow-right"></i>
				</button>
			</form>
		    <div class="conteiner-boton_agregar_productos" style=" text-align:center;margin:25px; ">
                 <a href="../gestion_de_productos.php" style="color:rgba(10, 180, 180, 1); padding: 0.85em 1.6em; text-align:center; text-decoration:none; border: 2px solid rgba(10, 180, 180, 1); ">Volver</a>
            </div>
		</div>
	</div>';
		mysqli_close($conexion);
		?>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>