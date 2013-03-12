<?php

class Producto{
	//Atributos
	public $id_producto;
	public $nombre;
	public $descripcion;
	public $costo;
	public $precio;

	function __construct($id_producto, $nombre, $descripcion, $costo, $precio){
		//Asignar las variables al objeto
		$this -> id_producto = $id_producto;
		$this -> nombre = $nombre;
		$this -> descripcion = $descripcion;
		$this -> costo = $costo;
		$this -> precio = $precio;
	}

}
