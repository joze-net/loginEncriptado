<?php 
class Usuario{

	private $nombre;
	private $contraseñaEncriptada;
	private $conexion;

	

	function Usuario($nom,$contra){

		$this->nombre=$nom;
		$contraseña=$contra;
		$this->contraseñaEncriptada=password_hash($contraseña,PASSWORD_DEFAULT,array("cost"=>12));//asi se realiza la encriptacion cambiando //tambienel coste o intensidad de la contraseña con el aaray

        include '../recursos/Recursos.php';
	    $this->conexion=new Conecta();//conecta es la clase que se encarga de realizar la conexion a db
	}

	function getUsuario(){
		return $this->nombre;
	}

	function getContraseña(){
		return $this->contraseñaEncriptada;
	}

	function registrarUsuario(){

			
			
			try {
				$sql="insert into Usuario (usuNombre,usuPassword) values ('$this->nombre','$this->contraseñaEncriptada')";//consulta con marcadores
				$registro=$this->conexion->conectar()->prepare($sql);//la funcion conectar devuelve una conexion y con ella preparamos la consulta
				
				$registro->execute();//ejecutamos la consulta preparada



			} catch (Exception $e) {
				echo "Error en clase Usuario metodo registrarUsuario " . $e;
			}

	}

	function ingresoUsuario($contra){
			$contraseñaCorrecta=false;
			try {
				$sql="select * from Usuario where usuNombre= '$this->nombre' ";//consulta con marcadores
				$registro=$this->conexion->conectar()->prepare($sql);//la funcion conectar devuelve una conexion y con ella preparamos la consulta
				
				$registro->execute();//ejecutamos la consulta preparada



				
					while ($row=$registro->fetch(PDO::FETCH_ASSOC)) {//recorremos la consulta para comparar la clave digita con la clave //encriptada en base de datos
						if (password_verify($contra, $row['usuPassword'])) {//con esta funcion compramos la clave ingresada en el login con //la encriptada de base de datos
							echo "Bienvenido ".$row['usuNombre'];//si coninciden mostramos el nombre del usuario
						}else{
							echo "usuario no registrado";//si no es que no esta registrado o la lve esta mal
						}
						
					}
					



			} catch (Exception $e) {
				echo "Error en clase Usuario metodo registrarUsuario " . $e;
			}
	}

	

}



 ?>
