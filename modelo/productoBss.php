<?php

class productoBss{

	//
	function listar(){
		//cargo los datos para la conexion

		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "SELECT
				*
				FROM
				producto";

		//Ejecutar el query
		$resultado = $conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//cierro la conexion
		$conexion -> close();

		if(!$resultado->num_rows > 0)
			return FALSE;

		//procesamos el resultado para convertirlo en un array
		while ($fila = $resultado->fetch_assoc())
			$productos[]= $fila;

		//regreso los productos
		return $productos;
	}

	function agregar($nombre, $descripcion, $costo, $precio){
		
		//cargo los datos para la conexion
		include ('productoClass.php');
		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "INSERT INTO
				producto(nombre,descripcion,costo,precio)
				VALUES(
					'$nombre',
					'$descripcion',
					$costo,
					$precio
					)
					";

		//Ejecutar el query
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//saber si se afecto algo
		if($conexion -> affected_rows > 0){
			$producto = new Producto($conexion->insert_id, $nombre, $descripcion, $costo, $precio);
		}

		//cierro la conexion
		$conexion -> close();

		return $producto;
	}

	function buscar_por_id($id_producto){
		//cargo los datos para la conexion

		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "SELECT
				*
				FROM
				producto
				WHERE id_producto='$id_producto'";

		//Ejecutar el query
		$resultado = $conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//cierro la conexion
		$conexion -> close();

		if(!$resultado->num_rows > 0)
			return FALSE;

		//procesamos el resultado para convertirlo en un array
		while ($fila = $resultado->fetch_assoc())
			$productos[]= $fila;

		//regreso los productos
		return $productos;
	}
	
	function buscar_por_nombre($nom){
		//cargo los datos para la conexion

		include ('data_bd.inc');

		//creo mi conexion
		$conexion = new mysqli($host, $user, $pass, $bd);
		if($conexion->connect_errno)
			die('No se pudo conectar a la bd');

		//generar el query
		$consulta = "SELECT
				*
				FROM
				producto
				WHERE nombre='$nom'";

		//Ejecutar el query
		$resultado = $conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}

		//cierro la conexion
		$conexion -> close();

		if(!$resultado->num_rows > 0)
			return FALSE;

		//procesamos el resultado para convertirlo en un array
		while ($fila = $resultado->fetch_assoc())
			$productos[]= $fila;

		//regreso los productos
		return $productos;
	}
}
