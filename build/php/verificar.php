<?
//variales 
$db ='wwwfinan_app';
$userDb = 'wwwfinan_boxis';
$passDb = 'Boxisleep.123$';

function conexion () {
	$usuario_db = $GLOBALS['userDb'];
	$passw_db = $GLOBALS['passDb'];
	$db = $GLOBALS['db'];
	$mysqli = new mysqli("localhost", $usuario_db, $passw_db, $db);
	if ($mysqli->connect_error) {
	    die('Error de Conexión (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
	}
	return $mysqli;	
}
function open_login() {	
	if (!isset($_SESSION['valid_user']) && isset($_POST['username']) ) {
		if(isset($_POST['username']) && isset( $_POST['password'])) {
			if($_POST['username'] !="" && $_POST['password'] !="") {
				$userid = $_POST['username'];
				$clave = $_POST['password'];
				$mysqli = conexion();
				$result = $mysqli->query("SELECT * FROM usuarios WHERE usuario ='$userid' AND password LIKE'".md5($cave)."'") or die(mysql_error());
				$filas = $result->num_rows;
				if($filas>0) {
					$_SESSION['valid_user']= $userid;
					while($row = $result->fetch_array(MYSQLI_ASSOC)){	
							$id_usuario = $row['id'];
							$foto_perfil = $row['foto_perfil'];
							$nombres = $row['nombres'];
							$apellidos = $row['apellidos'];
							$_SESSION['id_usuario'] = $id_usuario;
							$_SESSION['foto_perfil'] = $foto_perfil;
							$_SESSION['usuario'] = $nombres." ".$apellidos;
							$_SESSION['permisos']= $row["cargo"];
							/*****************************/
							$_SESSION['base_general'] = $db;
							/************************************/
					}
				}else {
					echo '
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					</head>
					<script language="javascript">					
					alert("Usuario o Contraseña incorrecto");
					location.href = "index.php";
					</script>
					 ';
				}
			}else {
			echo '
			<script language="javascript">
			alert("Ingresa correctamente los datos");
			location.href = "index.php";
			</script>
			  ';
			}

		}
	}else if(isset($_SESSION['valid_user'])) {
	}else {
		echo '
		<script language="javascript">
		alert("Realiza login para acceder");
		location.href = "index.php";
		</script>
		  ';
	}
}
function verificar($acceso) {
	if (isset($_SESSION['valid_user'])) {
		if($_SESSION['permisos'] == $acceso) {
		}
		else {
			echo '
		  	<script language="javascript">
		alert("No tienes permiso para ingresar");
		location.href = "principal.php";
		</script>
		  ';
		}
	}else {
		echo '
		  	<script language="javascript">
		alert("Haz login para ingresar a la aplicacion");
		location.href = "index.php";
		</script>
		  ';
	}

}

function verificar2($acceso,$acceso2) {
	if (isset($_SESSION['valid_user'])) {
		if($_SESSION['permisos'] == $acceso || $_SESSION['permisos'] == $acceso2) {
		}
		else {
			echo '
		  	<script language="javascript">
		alert("No tienes permiso para ingresar");
		location.href = "principal.php";
		</script>
		  ';
		}
	}else {
		echo '
		  	<script language="javascript">
		alert("Haz login para ingresar a la aplicacion");
		location.href = "index.php";
		</script>
		  ';
	}

}
function verificar3($acceso,$acceso2,$acceso3) {
	if (isset($_SESSION['valid_user'])) {
		if($_SESSION['permisos'] == $acceso || $_SESSION['permisos'] == $acceso2 || $_SESSION['permisos'] == $acceso3 ) {
		}
		else {
			echo '
		  	<script language="javascript">
		alert("No tienes permiso para ingresar");
		location.href = "principal.php";
		</script>
		  ';
		}
	}else {
		echo '
		  	<script language="javascript">
		alert("Haz login para ingresar a la aplicacion");
		location.href = "index.php";
		</script>
		  ';
	}

}
function verificar4($acceso,$acceso2,$acceso3,$acceso4,$acceso5) {
	if (isset($_SESSION['valid_user'])) {
		if($_SESSION['permisos'] == $acceso || $_SESSION['permisos'] == $acceso2 || $_SESSION['permisos'] == $acceso3 || $_SESSION['permisos'] == $acceso4 || $_SESSION['permisos'] == $acceso5) {
		}
		else {
			echo '
		  	<script language="javascript">
		alert("No tienes permiso para ingresar");
		location.href = "principal.php";
		</script>
		  ';
		}
	}else {
		echo '
		  	<script language="javascript">
		alert("Haz login para ingresar a la aplicacion");
		location.href = "index.php";
		</script>
		  ';
	}

}
function verificar5($acceso,$acceso2,$acceso3,$acceso4,$acceso5,$acceso6,$acceso7) {
	if (isset($_SESSION['valid_user'])) {
		if($_SESSION['permisos'] == $acceso || $_SESSION['permisos'] == $acceso2 || $_SESSION['permisos'] == $acceso3 || $_SESSION['permisos'] == $acceso4 || $_SESSION['permisos'] == $acceso5 || $_SESSION['permisos'] == $acceso6 || $_SESSION['permisos'] == $acceso7) {
		}
		else {
			echo '
		  	<script language="javascript">
		alert("No tienes permiso para ingresar");
		location.href = "principal.php";
		</script>
		  ';
		}
	}else {
		echo '
		  	<script language="javascript">
		alert("Haz login para ingresar a la aplicacion");
		location.href = "index.php";
		</script>
		  ';
	}

}
function verificar6($acceso,$acceso2,$acceso3,$acceso4,$acceso5,$acceso6,$acceso7,$acceso8 ) {
	if (isset($_SESSION['valid_user'])) {
		if($_SESSION['permisos'] == $acceso || $_SESSION['permisos'] == $acceso2 || $_SESSION['permisos'] == $acceso3 || $_SESSION['permisos'] == $acceso4 || $_SESSION['permisos'] == $acceso5 || $_SESSION['permisos'] == $acceso6 || $_SESSION['permisos'] == $acceso7 || $_SESSION['permisos'] == $acceso8) {
		}
		else {
			echo '
		  	<script language="javascript">
		alert("No tienes permiso para ingresar");
		location.href = "principal.php";
		</script>
		  ';
		}
	}else {
		echo '
		  	<script language="javascript">
		alert("Haz login para ingresar a la aplicacion");
		location.href = "index.php";
		</script>
		  ';
	}

}

function check_session() {
	//cambiar nombre tambien en administrador/actuaciones/login_web.php linea 16 y tambien en el logout misma carpeta
	if(isset($_SESSION['apiToken'])) {
		return true;
	}else {		
		return false;		
	}
}

?>
