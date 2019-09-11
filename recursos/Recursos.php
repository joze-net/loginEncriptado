<?php 

class Conecta{
	private $conexion;

	function conectar(){

		try {
			$this->conexion=new PDO("mysql:host=localhost;dbname=basepeliculas","root","1234");
		    $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			return $this->conexion;
			
		} catch (Exception $e) {
			echo "Error: ".$e;
		}
		


	}
}

 ?>