<?php
session_start();
require_once("build/php/verificar.php");
require_once("build/php/inclusiones.php");


if(!check_session()){
  header('Location:index.php');  
}else {
  if($_SESSION['permisosUsuario'] != "Ventas") {
    header('Location:dashboard.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <? 
    commonStyles();    
    ?>

    <title>Vista Lead Ventas</title>    

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title">
                <i class="fa">
                  <figure>
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                       viewBox="0 0 207.9 217.3" enable-background="new 0 0 207.9 217.3" xml:space="preserve">
                      <path id="XMLID_11718_" fill="#389FA3" d="M103.5,5C46.2,5,0,51.1,0,108.5s46.2,104.4,104.4,104.4c57.3,0,103.5-46.2,103.5-104.4
                      C207.9,51.1,161.7,5,103.5,5z M44.5,126.4l-10.3,10.3c-1.7,1.7-5.1,1.7-6.8,0l-0.9-0.9c-1.7-1.7-1.7-5.1,0-6.8l10.3-10.3
                      c1.7-1.7,5.1-1.7,6.8,0l0.9,0.9C46.2,121.3,46.2,124.7,44.5,126.4z M35.9,102.5c-1.7-3.4-1.7-7.7,0.9-9.4c0.9,0,2.6,0,3.4,0
                      c5.1,6,10.3,12.8,16.3,18c32.5,28.2,83,21.4,107.8-12.8c1.7-1.7,2.6-3.4,4.3-5.1c0.9,0,1.7,0,2.6,0c4.3,1.7,4.3,3.4,1.7,7.7
                      C142,148.7,67.6,149.5,35.9,102.5z M73.6,144.4l-6,12.8c-0.9,2.6-4.3,3.4-6,2.6h-0.9c-2.6-0.9-3.4-4.3-2.6-6l6-12.8
                      c0.9-2.6,4.3-3.4,6-2.6H71C73.6,139.2,74.4,141.8,73.6,144.4z M108.6,163.2c0,2.6-1.7,5.1-5.1,5.1h-0.9c-2.6,0-5.1-1.7-5.1-5.1
                      v-14.5c0-2.6,1.7-5.1,5.1-5.1h0.9c2.6,0,5.1,1.7,5.1,5.1V163.2z M148,159.8L148,159.8c-3.4,1.7-6,0-6.8-2.6l-6-12.8
                      c-0.9-2.6,0-5.1,2.6-6h0.9c2.6-0.9,5.1,0,6,2.6l6,12.8C151.4,156.4,150.5,158.9,148,159.8z M181.3,136.7c-1.7,1.7-5.1,1.7-6.8,0
                      l-10.3-10.3c-1.7-1.7-1.7-5.1,0-6.8l0.9-0.9c1.7-1.7,5.1-1.7,6.8,0l10.3,10.3C183,131.5,183,135,181.3,136.7L181.3,136.7z"/>
                  </svg>
                  </figure>
                </i> 
                <span>
                  <figure>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 165.7 25.2" style="enable-background:new 0 0 165.7 25.2;" xml:space="preserve">
                                    <style type="text/css">
                                      .st0{fill:none;}
                                      .st1{fill:#FFFFFF;}
                                      .st2{fill:#00C6C1;}
                                    </style>
                                    <g id="XMLID_11716_">
                                      <g id="XMLID_11746_">
                                        <circle id="XMLID_11756_" class="st0" cx="32.3" cy="22.1" r="2.7"></circle>
                                        <circle id="XMLID_11747_" class="st0" cx="8.3" cy="17.3" r="2.7"></circle>
                                      </g>
                                      <g id="XMLID_11717_">
                                        <g id="XMLID_11726_">
                                          <path id="XMLID_11742_" class="st1" d="M17.4,17.7c0,4.6-3.6,7.4-8.8,7.4H0V0.2h8c5.1,0,8.1,2.9,8.1,6.8c0,1.9-0.9,3.5-2.2,4.7                         C15.9,13.1,17.4,15.1,17.4,17.7z M5.2,9.8H8c1.7,0,2.9-0.7,2.9-2.2c0-1.4-1.2-2.2-2.9-2.2H5.2V9.8z M12.2,17.3                         c0-1.6-1.3-2.7-3.5-2.7H5.2v5.2h3.4C11,19.9,12.2,18.9,12.2,17.3z"></path>
                                          <path id="XMLID_11740_" class="st1" d="M59.8,12.6L69,25.1h-6.3L56.7,17l-6.1,8.1h-6.3l9.2-12.4L44.3,0.2h6.3l6.1,8.1l6.1-8.1H69                         L59.8,12.6z"></path>
                                          <path id="XMLID_11738_" class="st1" d="M70.5,0.2h5.2v24.8h-5.2V0.2z"></path>
                                          <path id="XMLID_11736_" class="st1" d="M83.2,18.7c0.3,3.2,3.1,5,5.8,5c3.4,0,5.5-1.8,5.5-4.4c0-3.2-2.8-4.7-5.9-6.2                         c-3.6-1.8-6.6-3.2-6.6-7.2c0-3.4,3-5.8,6.7-5.8c3.6,0,6.2,2.6,6.5,5.8h-1.7c-0.3-2.4-2.2-4.3-4.8-4.3c-2.8,0-5,1.8-5,4.2                         c0,3.2,2.5,4.3,5.4,5.6c4,1.9,7.1,3.9,7.1,7.8c0,3.6-3,6-7.2,6c-3.8,0-7.2-2.5-7.4-6.5H83.2z"></path>
                                          <path id="XMLID_11734_" class="st1" d="M112.5,23.5v1.6h-11.6V0.2h1.6v23.2H112.5z"></path>
                                          <path id="XMLID_11732_" class="st1" d="M117.7,1.8v9.6h8.4V13h-8.4v10.4h10.8v1.6h-12.4V0.2h12.4v1.6H117.7z"></path>
                                          <path id="XMLID_11730_" class="st1" d="M134.6,1.8v9.6h8.4V13h-8.4v10.4h11.2v1.6H133V0.2h12.8v1.6H134.6z"></path>
                                          <path id="XMLID_11727_" class="st1" d="M165.7,8.1c0,5.1-3.6,7.8-8.4,7.8h-5.5v9.2h-2V0.2h7.5C162,0.2,165.7,2.9,165.7,8.1z                          M164,8.1c0-4.2-2.9-6.2-6.7-6.2h-5.5v12.4h5.5C161.2,14.3,164,12.3,164,8.1z"></path>
                                        </g>
                                        <path id="XMLID_11718_" class="st2" d="M32.1,0.5C25.4,0.5,20,5.9,20,12.6c0,6.7,5.4,12.2,12.2,12.2c6.7,0,12.1-5.4,12.1-12.2                        C44.3,5.9,38.9,0.5,32.1,0.5z M25.2,14.7l-1.2,1.2c-0.2,0.2-0.6,0.2-0.8,0l-0.1-0.1c-0.2-0.2-0.2-0.6,0-0.8l1.2-1.2                        c0.2-0.2,0.6-0.2,0.8,0l0.1,0.1C25.4,14.1,25.4,14.5,25.2,14.7z M24.2,11.9C24,11.5,24,11,24.3,10.8c0.1,0,0.3,0,0.4,0                        c0.6,0.7,1.2,1.5,1.9,2.1c3.8,3.3,9.7,2.5,12.6-1.5c0.2-0.2,0.3-0.4,0.5-0.6c0.1,0,0.2,0,0.3,0c0.5,0.2,0.5,0.4,0.2,0.9                        C36.6,17.3,27.9,17.4,24.2,11.9z M28.6,16.8l-0.7,1.5c-0.1,0.3-0.5,0.4-0.7,0.3l-0.1,0c-0.3-0.1-0.4-0.5-0.3-0.7l0.7-1.5                        c0.1-0.3,0.5-0.4,0.7-0.3l0.1,0C28.6,16.2,28.7,16.5,28.6,16.8z M32.7,19c0,0.3-0.2,0.6-0.6,0.6h-0.1c-0.3,0-0.6-0.2-0.6-0.6v-1.7                        c0-0.3,0.2-0.6,0.6-0.6h0.1c0.3,0,0.6,0.2,0.6,0.6V19z M37.3,18.6L37.3,18.6c-0.4,0.2-0.7,0-0.8-0.3l-0.7-1.5                        c-0.1-0.3,0-0.6,0.3-0.7l0.1,0c0.3-0.1,0.6,0,0.7,0.3l0.7,1.5C37.7,18.2,37.6,18.5,37.3,18.6z M41.2,15.9c-0.2,0.2-0.6,0.2-0.8,0                        l-1.2-1.2c-0.2-0.2-0.2-0.6,0-0.8l0.1-0.1c0.2-0.2,0.6-0.2,0.8,0l1.2,1.2C41.4,15.3,41.4,15.7,41.2,15.9L41.2,15.9z"></path>
                                      </g>
                                    </g>
                                </svg>
                  </figure>
                </span>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><? echo $nombreUser ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3><? echo utf8_encode($cargo) ?></h3>
                <ul class="nav side-menu">
                  <!-- / aca contenido menu side -->
                  <? 
                  sideBarMenu();
                  ?>
                  <!-- / aca contenido menu side -->
                </ul>
              </div>              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?
            footerSideBarMenu();
            ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <?
                  topMenu();
                ?>    
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">                
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Financiamientos</span>
              <div class="count">2500</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Tiempo de respuesta</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Compradores hombres</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Compradoras mujeres</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total financiamientos Aprobados</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total financiamientos Rechazados</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
          <!-- /top tiles -->          

          <div class="clearfix"></div>

          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Vista usuario <small></small></h2>
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

                    <form id="formIngresoVentas" class="form-horizontal form-label-left" novalidate="">
                      
                      <span class="section">Información personal</span>
                      
                      <div class="">                  
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="alertError">                            
                            </div>
                          </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Marca <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="marca"></span>                          
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Colchón <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="colchon"></span>                                                    
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Precio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                          
                          <span class="vista" id="precio"></span>                          
                        </div>
                      </div>                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="nombre"></span>                                                    
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipoDocumento">Tipo de documento <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="tipoDocumento"></span>                                                    
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cédula <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="cedula"></span>                                                    
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="email"></span>                                                    
                        </div>
                      </div>                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Télefono <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="telefono"></span>                                                    
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ciudad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="ciudad"></span>                                                    
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Canal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="canal"></span>                                                    
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contesto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="contesto"></span>                                                                              
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Estado <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="estado"></span>                                                                              
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Comentarios
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <span class="vista" id="comentarios"></span>                                                                              
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <!--<button id="send" type="submit" class="btn btn-success">Guardar</button>-->
                          <a href="dashboard.php" class="btn btn-primary">Atras</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Boxisleep.com <a href="https://colorlib.com">Jmoreno - 102201</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    

    <!-- Custom Theme Scripts -->
    <? 
    commonScripts();
    // recojemos todos los datos con respecto al usuario    
    $id = base64_decode($_GET['id']);    
    $mysqli = conexion();    
    $usuarioGeneral = $_SESSION['usuarioWeb'];    
    $result = $mysqli->query("SELECT * FROM `inleadfi` WHERE id ='$id' ");        
    $filas = $result->num_rows;           
    if($filas>0) {      
      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $marca = $row['marca'];        
        $colchon = $row['colchon'];
        $precio = $row['precio'];
        $nombre = $row['nombre'];
        $tipoDocumento = $row['tipoDocumento'];
        $cedula = $row['cedula'];
        $email = $row['email'];
        $telefono = $row['telefono'];
        $ciudad = $row['ciudad'];
        $canal = $row['canal'];
        $contesto = $row['contesto'];
        $estado = $row['estado'];
        $comentarios = $row['comentarios'];    

        echo '
        <script>
          $(document).ready(function(){            
            $("#marca").text("'.$marca.'");
            $("#colchon").text("'.$colchon.'");
            $("#precio").text("'.$precio.'");
            $("#nombre").text("'.$nombre.'");
            $("#tipoDocumento").text("'.$tipoDocumento.'");
            $("#cedula").text("'.$cedula.'");
            $("#email").text("'.$email.'");
            $("#telefono").text("'.$telefono.'");
            $("#ciudad").text("'.$ciudad.'");
            $("#canal").text("'.$canal.'");
            $("#contesto").text("'.$contesto.'");
            $("#estado").text("'.$estado.'");
            $("#comentarios").text("'.$comentarios.'");          
          });                                        
        </script>
        ';

      }   
    }else {
      $mysqli->error;
    }
    
    ?>
	
  </body>

</html>
