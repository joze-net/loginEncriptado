<?php 
class Usuario{

	private $nombre;
	private $contraseña;

	

	function Usuario($nom,$contra){

		$this->nombre=$nom;
		$this->contraseña=$contra;

	}

	function getUsuario(){
		return $this->nombre;
	}

	function getContraseña(){
		return $this->contraseña;
	}

	function registrarUsuario(){

			include '../recursos/Recursos.php';
			$conexion=new Conecta();//conecta es la clase que se encarga de realizar la conexion a db
			
			try {
				$sql="insert into Usuario (usuNombre,usuPassword) values ('$this->nombre','$this->contraseña')";//consulta con marcadores
				$registro=$conexion->conectar()->prepare($sql);//la funcion conectar devuelve una conexion y con ella preparamos la consulta
				
				$registro->execute();//ejecutamos la consulta preparada

			} catch (Exception $e) {
				echo "Error en clase Usuario metodo registrarUsuario " . $e;
			}

	}

}



 ?>
