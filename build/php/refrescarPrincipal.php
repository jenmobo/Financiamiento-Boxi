<?
session_start();
require_once("verificar.php");


if(check_session()) {
	$mysqli = conexion();
  if($_SESSION['permisosUsuario'] == "Ventas") {
    
  }














	echo
		'<!-- ======== tabla de en espera o proceso ============= -->
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Procesos en Estudio</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">                      
                    </p>
                    <table id="datatable1" class="datatable table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Cédula</th>
                          <th>Télefono</th>
                          <th>Estado</th>
                          <th>Ver más</th>                          
                        </tr>
                      </thead>
                      <tbody>
                      ';
                      	if($_SESSION['permisosUsuario'] == "Ventas") {
                            // procesos en espera de manejo
                            $result = $mysqli->query("SELECT * FROM inleadfi WHERE etapa ='estudio de financiamiento' ");
                            $filas = $result->num_rows;
                            if($filas>0) {
                              while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                $id = $row['id'];
                                $nombre = $row['nombre'];
                                $cedula = $row['cedula']; 
                                $telefono = $row['telefono'];
                                $estado = $row['etapa'];      
                                echo'
                                  <tr>
                                    <td>'.$nombre.'</td>
                                    <td>'.$cedula.'</td>
                                    <td>'.$telefono.'</td>                          
                                    <td>'.$estado.'</td>                          
                                    <td class="dashMas alert-warning">
                                      <a href="vistaleadventas.php?id='.base64_encode($id).'">
                                        <i class="fa fa-plus-square"></i> Más
                                      </a>
                                    </td>
                                  </tr>                        
                                ';
                              }
                            }                            
                        }
                        else if($_SESSION['permisosUsuario'] == "Financiero") {
                            // procesos en espera de manejo
                            $result = $mysqli->query("SELECT * FROM inleadfi WHERE etapa ='estudio de financiamiento' ");
                            $filas = $result->num_rows;
                            if($filas>0) {
                              while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                $id = $row['id'];
                                $nombre = $row['nombre'];
                                $cedula = $row['cedula']; 
                                $telefono = $row['telefono'];
                                $estado = $row['etapa'];      
                                echo'
                                  <tr>
                                    <td>'.$nombre.'</td>
                                    <td>'.$cedula.'</td>
                                    <td>'.$telefono.'</td>                          
                                    <td>'.$estado.'</td>                          
                                    <td class="dashMas alert-error">
                                      <a href="vistaleadfinan.php?id='.base64_encode($id).'">
                                        <i class="fa fa-plus-square"></i> Más
                                      </a>
                                    </td>
                                  </tr>                        
                                ';
                              }
                            }
                        }
        			echo'
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
         </div> 
         <!-- ======== tabla de en espera o proceso ============= -->
         ';		
  echo
    '<!-- ======== tabla en contacto ============= -->
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Procesos en Recontacto</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">                      
                    </p>
                    <table id="datatable1" class="datatable table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Cédula</th>
                          <th>Télefono</th>
                          <th>Estado</th>
                          <th>Ver más</th>                          
                        </tr>
                      </thead>
                      <tbody>
                      ';
                        if($_SESSION['permisosUsuario'] == "Ventas") {
                            // procesos en espera de manejo
                            $result = $mysqli->query("SELECT * FROM inleadfi WHERE etapa ='en contacto' ");
                            $filas = $result->num_rows;
                            if($filas>0) {
                              while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                $id = $row['id'];
                                $nombre = $row['nombre'];
                                $cedula = $row['cedula']; 
                                $telefono = $row['telefono'];
                                $estado = $row['etapa'];      
                                echo'
                                  <tr>
                                    <td>'.$nombre.'</td>
                                    <td>'.$cedula.'</td>
                                    <td>'.$telefono.'</td>                          
                                    <td>'.$estado.'</td>                          
                                    <td class="dashMas alert-info">
                                      <a href="vistaleadventas.php?id='.base64_encode($id).'">
                                        <i class="fa fa-plus-square"></i> Más
                                      </a>
                                    </td>
                                  </tr>                        
                                ';
                              }
                            }                            
                        }
                        else if($_SESSION['permisosUsuario'] == "Financiero") {
                            // procesos en espera de manejo
                            $result = $mysqli->query("SELECT * FROM inleadfi WHERE etapa ='en contacto'");
                            $filas = $result->num_rows;
                            if($filas>0) {
                              while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                $id = $row['id'];
                                $nombre = $row['nombre'];
                                $cedula = $row['cedula']; 
                                $telefono = $row['telefono'];
                                $estado = $row['etapa'];      
                                echo'
                                  <tr>
                                    <td>'.$nombre.'</td>
                                    <td>'.$cedula.'</td>
                                    <td>'.$telefono.'</td>                          
                                    <td>'.$estado.'</td>                          
                                    <td class="dashMas alert-error">
                                      <a href="vistaleadfinan.php?id='.base64_encode($id).'">
                                        <i class="fa fa-plus-square"></i> Más
                                      </a>
                                    </td>
                                  </tr>                        
                                ';
                              }
                            }
                        }
              echo'
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
         </div> 
         <!-- ======== tabla en contacto ============= -->
         ';   






}else {
	header('Location:index.php');
}

?>