<?
session_start();
require_once("verificar.php");

$usuario = $_POST['username'];
$contraseña = $_POST['password'];

//echo check_session();

if(isset($_POST['username']) && isset($_POST['password']) && !check_session()) {
	$userid = $_POST['username'];
	$clave = $_POST['password'];
	$mysqli = conexion();
	$result = $mysqli->query("SELECT * FROM usuarios WHERE usuario ='$userid' AND password LIKE'".md5($clave)."'");
	$filas = $result->num_rows;
	if($filas>0) {
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$permisos = $row['permisos'];			
			$_SESSION['permisosUsuario'] = $permisos;		
		}
		$_SESSION['apiToken'] = $userid;		
		// este usuario sera para la obtencion de datos para cuando se haga cambio de contraseña se necesite el usuario
		$_SESSION['usuarioWeb'] = $userid;
		if($_SESSION['permisosUsuario'] == "Super Administrador") {
			echo"success SAdmin";	
		}else {
			echo "success";
		}		
	}
	else {
		echo"usuario no encontrado";
	}
}else {
	echo"login falso";
}