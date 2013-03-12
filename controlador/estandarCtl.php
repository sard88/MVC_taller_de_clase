<?php

class estandarCtl{
	
	public $modelo;	

	function __construct(){
		//incluir el modelo
		include('modelo/productoBss.php');

		//creo el objeto de modelo
		$this->modelo = new productoBss();
	}

	function ejecutar(){
		//si no hay una accion definida en las variables entonces listo los productos
		if(!isset($_REQUEST['accion'])){
			$productos_array = $this->modelo->listar();
			//incluir la vista
			include('vista/productoVistaView.php');

			if(is_array($productos_array)){
				//incluir vista
				include('vista/productoVistaView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No hay datos');
			}
			
		}
		if($_REQUEST['accion']=='agregar'){
			$producto = $this->modelo->agregar($_REQUEST['nom'],$_REQUEST['des'],$_REQUEST['cos'],$_REQUEST['pre']);
			if(is_object($producto)){
				//incluir vista
				include('vista/ProductoAgregadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se pudo agregar');
			}
		}
		if($_REQUEST['accion']=='buscar_id'){
			$producto = $this->modelo->buscar_por_id($_REQUEST['id']);
			if(is_array($producto)){
				//incluir vista
				include('vista/productoBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese ID');
			}
		}
		if($_REQUEST['accion']=='buscar_nombre'){
			$producto = $this->modelo->buscar_por_nombre($_REQUEST['nom']);
			if(is_array($producto)){
				//incluir vista
				include('vista/productoBuscadoView.php');
			}
			else{
				//mando a llamar la lista de errores
				die('No se encontro ningun registro con ese Nombre');
			}
		}
	}
}
