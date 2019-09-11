
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript">
		body=document.getElementById('body');
		function confirmarRegistro () {
			
			alert("Registro exitoso");
		}

		body.addEventListener(confirmarRegistro());
	</script>
</head>
<body id="body" >

</body>
</html>
<?php 

$usuario=$_POST['usuario'];
$clave=$_POST['contraseña'];

require '../modelo/Usuario.php';

$nuevoUsuario=new Usuario($usuario,$clave);

$nuevoUsuario->registrarUsuario();



?>

<?php 
header("location: ../vista/index.html");
 ?>





