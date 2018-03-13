<?php
session_start();
// Borramos toda la sesion
unset($_SESSION['apiToken']);
unset($_SESSION['base_general']);
setcookie("pass","activado",time()+0.1);
setcookie("usuario","usuario",time()+0.1);
?>
<style type="text/css">
body {
	background-color: #FFF;
}
</style>
</head>
<SCRIPT LANGUAGE="javascript">
alert("Has cerrado sesión");
location.href = "index.php";
</SCRIPT>
<body>
</body>
</html>
