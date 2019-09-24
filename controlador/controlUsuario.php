
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
</head>
<body id="body" >

</body>
</html>
<?php 

$usuario=$_POST['usuario'];
$clave=$_POST['contraseña'];

require '../modelo/Usuario.php';

$nuevoUsuario=new Usuario($usuario,$clave);

if (isset($_POST['registrar'])) {//este es un botn el cual es del formulario de registro
	echo "boton registrar";
	$nuevoUsuario->registrarUsuario();
}else if (isset($_POST['ingresar'])) {//y este boton cporresponde al frm de ingreso de usuarios
	$nuevoUsuario->ingresoUsuario($clave);
}








?>

<?php  
//header("location: ../vista/index.html");
//echo "bienvenido $usuario clave ".$nuevoUsuario->getContraseña();
 ?>





