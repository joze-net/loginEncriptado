<?php 
class Usuario{

	private $nombre;
	private $contraseñaEncriptada;

	

	function Usuario($nom,$contra){

		$this->nombre=$nom;
		$contraseña=$contra;
		$this->contraseñaEncriptada=password_hash($contraseña,PASSWORD_DEFAULT);


	}

	function getUsuario(){
		return $this->nombre;
	}

	function getContraseña(){
		return $this->contraseñaEncriptada;
	}

	function registrarUsuario(){

			include '../recursos/Recursos.php';
			$conexion=new Conecta();//conecta es la clase que se encarga de realizar la conexion a db
			
			try {
				$sql="insert into Usuario (usuNombre,usuPassword) values ('$this->nombre','$this->contraseñaEncriptada')";//consulta con marcadores
				$registro=$conexion->conectar()->prepare($sql);//la funcion conectar devuelve una conexion y con ella preparamos la consulta
				
				$registro->execute();//ejecutamos la consulta preparada

			} catch (Exception $e) {
				echo "Error en clase Usuario metodo registrarUsuario " . $e;
			}

	}

}



 ?>
