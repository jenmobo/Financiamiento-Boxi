<?php
require_once("verificar.php");
// recojemos todos los datos con respecto al usuario
$mysqli = conexion();
$usuarioGeneral = $_SESSION['usuarioWeb'];
$result = $mysqli->query("SELECT * FROM usuarios WHERE usuario ='$usuarioGeneral' ");
$filas = $result->num_rows;
if($filas>0) {
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $nombreUser = $row['nombres'];
    $cargo = $row['permisos'];      
  }   
}else {

}


function menu_login() {
	echo '
		<a href="logout.php" title="Log Out" data-placement="bottom" rel="tooltip" class="iWidget iwidget-small" ><span><i class="icon-key"></i></span></a>
		<a href="#" title="Tarificador" data-placement="bottom" rel="tooltip" class="iWidget iwidget-small" ><span><i class="icon-signal"></i></span></a>
        <a href="#" title="Mensajería" data-placement="bottom" rel="tooltip" class="iWidget iwidget-small" ><span><i class="icon-inbox"></i></span></a>
        <a href="funciones_usuario.php" title="Úsuario" data-placement="bottom" rel="tooltip" class="iWidget iwidget-small" ><span><i class="icon-user"></i></span></a>
        <script>
            $(".iWidget").tooltip();
        </script>
	';
}
function info_profile() {
	if(isset($_SESSION['usuario'])) {
		echo '
		<div><div id="foto_perfil" class="img-polaroid"><img src="'.$_SESSION['foto_perfil'].'" width="55" height="50" />
		</div></div>
		<div id="nombre_perfil"><i style="margin-right:5px;" class="icon-user"></i><span>'.$_SESSION['usuario'].'</span></div>
		<div id="cargo"><i class="icon-list-alt"></i><small style="color:#FFF;">  '.$_SESSION['permisos'].'</small></div>
        <div style="width:100%;"><i style="float:left;" class="icon-calendar"></i>
		<div class="tiempo" style="font-size:10px; "></div></div>
		<script type="text/javascript">
			$(document).ready(function(e) {
				$(".tiempo").mostrarTiempo();
			});
		</script>
        <div id="clear"></div>
		';
	}
}
function menu_principal() {
	if(isset($_SESSION['permisos'])) {
		if($_SESSION['permisos'] == "Administrador") {
			echo'
		        <ul>
                    <li class="has-sub">
                        <a href="principal.php">
                        <i class="icon-home"></i>
                        <span class="title">Inicio</span>
                        </a>
                    </li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-cogs"></i>
                        <span class="title">Procesos</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
							<li>
						   <a onclick="menu_item(this)"><i class="icon-folder-close m2"></i><small class="small-listado">Comercial</small></a>
								<ul  id="menu_iitem" class="menu_items" style="margin-left:20px; width:170px;">
									 <li><a href="gestion_clientes.php">Gestión Clientes</a></li>
									   <li><a href="solicitud_cotizacion.php">Solicitud Cotización</a></li>
									   <li><a href="crear_usuario.php">Generación Oferta Comercial</a>
								</ul>
						   </li>

							<li>
						    <a onclick="menu_item(this)"><i class="icon-folder-close m2"></i><small class="small-listado">Pricing</small></a>
								<ul  id="menu_iitem" class="menu_items" style="margin-left:20px; width:170px;">
									<li><a href="crear_usuario.php">Gestión Solicitud Cotización Interna</a></li>
									<li><a href="crear_usuario.php">Solicitud Tarifas a Proveedor</a></li>
									<li><a href="crear_usuario.php">Entrega Tarifas a Comercial</a></li>
								</ul>
						    </li>

                           <li>
						   <a onclick="menu_item(this)"><i class="icon-folder-close m2"></i><small class="small-listado">Operaciones</small></a>
								<ul id="menu_iitem" class="menu_items" style="margin-left:20px; width:170px;">
									<li><a href="crear_usuario.php">Portada D.O.</a></li>
								   <li><a href="crear_usuario.php">Instrucciones de Embarque</a></li>
								   <li><a href="crear_usuario.php">Corte Documentos de Transportador</a></li>
								   <li><a href="crear_usuario.php">Solicitud Anticipo</a></li>
								   <li><a href="crear_usuario.php">Radicación Documentos en Puerto</a></li>
								   <li><a href="crear_usuario.php">Certificación Fletes</a></li>
								   <li><a href="crear_usuario.php">Liquidación D.O.</a></li>
								   <li><a href="crear_usuario.php">Trazabilidad de la Operación</a></li>
								</ul>
						   </li>

						   <li>
						   <a onclick="menu_item(this)"><i class="icon-folder-close m2"></i><small class="small-listado">Facturación</small></a>
								<ul  id="menu_iitem" class="menu_items" style="margin-left:20px; width:170px;">
									 <li><a href="crear_usuario.php">Elaborar  Factura Comercial de Venta</a></li>
						  			 <li><a href="crear_usuario.php">Imprimir Factura</a></li>
								</ul>
						   </li>

						    <li>
						   <a onclick="menu_item(this)"><i class="icon-folder-close m2"></i><small class="small-listado">Cartera</small></a>
								<ul  id="menu_iitem" class="menu_items" style="margin-left:20px; width:170px;">
									<li><a href="crear_usuario.php">Gestión de  Cartera</a></li>
								</ul>
						   </li>

                        </ul>
					</li>

                     <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-group"></i>
                        <span class="title">Actuaciones</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="crear_usuario.php">Crear usuario</a></li>
                            <li><a href="agregar_servicio.php">Agregar Servicio</a></li>
                            <li><a href="ui_elements_buttons.html">Ingresar tracking</a></li>

                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-list-alt"></i>
                        <span class="title">Consultas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">D.O</a></li>
                            <li><a href="ui_elements_buttons.html">Tracking</a></li>
                            <li><a href="ui_elements_buttons.html">Facturas de venta</a></li>
                            <li><a href="ui_elements_buttons.html">Cartera</a></li>
                            <li><a href="lista_empleados.php">Empleados</a></li>
                            <li><a href="consulta_clientes.php">Clientes</a></li>
                            <li><a href="consulta_proov_logistico.php">Proveedor-Logístico</a></li>
                            <li><a href="consulta_proov_administrativo.php">Proveedor-Administrativo</a></li>
                            <li><a href="ui_elements_buttons.html">Tarifas de Referencia</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-signal"></i>
                        <span class="title">Estadísticas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html" class="disabled">Cotizaciones Solicitadas</a></li>
                            <li><a href="ui_elements_buttons.html">Cotizaciones Aprobadas</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Cotizaciones por Comercial</a></li>
                            <li><a href="ui_elements_sliders.html">D.O. por Coordinador</a></li>
                            <li><a href="ui_elements_typography.html">Contenedores por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Indicadores</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">Por Proceso</a></li>
                            <li><a href="ui_elements_buttons.html">Por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-download"></i>
                        <span class="title">Descargas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">General</a></li>
                            <li><a href="ui_elements_buttons.html">Buttons</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui_elements_sliders.html">Sliders</a></li>
                            <li><a href="ui_elements_typography.html">Typography</a></li>
                            <li><a href="ui_elements_tree.html">Tree View</a></li>
                            <li><a href="ui_elements_nestable.html">Nestable List</a></li>
                        </ul>
					</li>
                </ul>
	';
		}/*************fin estado********************/
		else if($_SESSION['permisos'] == "Comercial") {
			echo'
		<ul>
                    <li class="has-sub">
                        <a href="principal.php">
                        <i class="icon-home"></i>
                        <span class="title">Inicio</span>
                        </a>
                    </li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-cogs"></i>
                        <span class="title">Actividades</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                           <li><a href="gestion_clientes.php">Gestión de Clientes</a></li>
						   <li><a href="solicitud_cotizacion.php">Solicitud de Cotización</a></li>
						   <li><a href="generacion_oferta.php">Generación de Oferta Comercial</a></li>
                        </ul>
					</li>

                     <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-group"></i>
                        <span class="title">Actuaciones</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="crear_usuario.php">Crear usuario</a></li>
                            <li><a href="agregar_servicio.php">Agregar Servicio</a></li>
                            <li><a href="ui_elements_buttons.html">Ingresar tracking</a></li>

                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-list-alt"></i>
                        <span class="title">Consultas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">D.O</a></li>
                            <li><a href="ui_elements_buttons.html">Tracking</a></li>
                            <li><a href="ui_elements_buttons.html">Facturas de venta</a></li>
                            <li><a href="ui_elements_buttons.html">Cartera</a></li>
                            <li><a href="lista_empleados.php">Empleados</a></li>
                            <li><a href="consulta_clientes.php">Clientes</a></li>
                            <li><a href="consulta_proov_logistico.php">Proveedor-Logistico</a></li>
                            <li><a href="consulta_proov_administrativo.php">Proveedor-Administrativo</a></li>
                            <li><a href="ui_elements_buttons.html">Tarifas de Referencia</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-signal"></i>
                        <span class="title">Estadísticas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html" class="disabled">Cotizaciones Solicitadas</a></li>
                            <li><a href="ui_elements_buttons.html">Cotizaciones Aprobadas</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Cotizaciones por Comercial</a></li>
                            <li><a href="ui_elements_sliders.html">D.O. por Coordinador</a></li>
                            <li><a href="ui_elements_typography.html">Contenedores por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Indicadores</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">Por Proceso</a></li>
                            <li><a href="ui_elements_buttons.html">Por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-download"></i>
                        <span class="title">Descargas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">General</a></li>
                            <li><a href="ui_elements_buttons.html">Buttons</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui_elements_sliders.html">Sliders</a></li>
                            <li><a href="ui_elements_typography.html">Typography</a></li>
                            <li><a href="ui_elements_tree.html">Tree View</a></li>
                            <li><a href="ui_elements_nestable.html">Nestable List</a></li>
                        </ul>
					</li>
                </ul>
	';
		}/*************fin estado********************/
		else if($_SESSION['permisos'] == "Pricing") {
			echo'
		<ul>
                    <li class="has-sub">
                        <a href="principal.php">
                        <i class="icon-home"></i>
                        <span class="title">Inicio</span>
                        </a>
                    </li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-cogs"></i>
                        <span class="title">Actividades</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                           <li><a href="principal_solicitud_interna.php">Gestion Solicitud Cotizacion Interna</a></li>
                           <li><a href="cliente_nuevo.php">Solicitud Tarifas a Proovedor</a></li>
                           <li><a href="cliente_nuevo.php">Entrega Tarifas a Comercial</a></li>
                        </ul>
					</li>

                     <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-group"></i>
                        <span class="title">Actuaciones</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="crear_usuario.php">Crear usuario</a></li>
                            <li><a href="agregar_servicio.php">Agregar Servicio</a></li>
                            <li><a href="ui_elements_buttons.html">Ingresar tracking</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-list-alt"></i>
                        <span class="title">Consultas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">D.O</a></li>
                            <li><a href="ui_elements_buttons.html">Tracking</a></li>
                            <li><a href="ui_elements_buttons.html">Facturas de venta</a></li>
                            <li><a href="ui_elements_buttons.html">Cartera</a></li>
                            <li><a href="lista_empleados.php">Empleados</a></li>
                            <li><a href="ui_elements_buttons.html">Clientes</a></li>
                            <li><a href="consulta_proov_logistico.php">Proveedor-Logistico</a></li>
                            <li><a href="consulta_proov_administrativo.php">Proveedor-Administrativo</a></li>
                            <li><a href="ui_elements_buttons.html">Tarifas de Referencia</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-signal"></i>
                        <span class="title">Estadísticas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html" class="disabled">Cotizaciones Solicitadas</a></li>
                            <li><a href="ui_elements_buttons.html">Cotizaciones Aprobadas</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Cotizaciones por Comercial</a></li>
                            <li><a href="ui_elements_sliders.html">D.O. por Coordinador</a></li>
                            <li><a href="ui_elements_typography.html">Contenedores por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Indicadores</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">Por Proceso</a></li>
                            <li><a href="ui_elements_buttons.html">Por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-download"></i>
                        <span class="title">Descargas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">General</a></li>
                            <li><a href="ui_elements_buttons.html">Buttons</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui_elements_sliders.html">Sliders</a></li>
                            <li><a href="ui_elements_typography.html">Typography</a></li>
                            <li><a href="ui_elements_tree.html">Tree View</a></li>
                            <li><a href="ui_elements_nestable.html">Nestable List</a></li>
                        </ul>
					</li>
                </ul>
	';
		}/*************fin estado********************/
		else if($_SESSION['permisos'] == "Operacional") {
			echo'
		<ul>
                    <li class="has-sub">
                        <a href="principal.php">
                        <i class="icon-home"></i>
                        <span class="title">Inicio</span>
                        </a>
                    </li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-cogs"></i>
                        <span class="title">Actividades</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                           <li><a href="cliente_nuevo.php">Cliente nuevo</a></li>
                        </ul>
					</li>

                     <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-group"></i>
                        <span class="title">Actuaciones</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="crear_usuario.php">Crear usuario</a></li>
                            <li><a href="ui_elements_buttons.html">Ingresar tracking</a></li>

                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-list-alt"></i>
                        <span class="title">Consultas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">D.O</a></li>
                            <li><a href="ui_elements_buttons.html">Tracking</a></li>
                            <li><a href="ui_elements_buttons.html">Facturas de venta</a></li>
                            <li><a href="ui_elements_buttons.html">Cartera</a></li>
                            <li><a href="lista_empleados.php">Empleados</a></li>
                            <li><a href="ui_elements_buttons.html">Clientes</a></li>
                            <li><a href="consulta_proov_logistico.php">Proveedor-Logistico</a></li>
                            <li><a href="consulta_proov_administrativo.php">Proveedor-Administrativo</a></li>
                            <li><a href="ui_elements_buttons.html">Tarifas de Referencia</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-signal"></i>
                        <span class="title">Estadísticas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html" class="disabled">Cotizaciones Solicitadas</a></li>
                            <li><a href="ui_elements_buttons.html">Cotizaciones Aprobadas</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Cotizaciones por Comercial</a></li>
                            <li><a href="ui_elements_sliders.html">D.O. por Coordinador</a></li>
                            <li><a href="ui_elements_typography.html">Contenedores por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Indicadores</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">Por Proceso</a></li>
                            <li><a href="ui_elements_buttons.html">Por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-download"></i>
                        <span class="title">Descargas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">General</a></li>
                            <li><a href="ui_elements_buttons.html">Buttons</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui_elements_sliders.html">Sliders</a></li>
                            <li><a href="ui_elements_typography.html">Typography</a></li>
                            <li><a href="ui_elements_tree.html">Tree View</a></li>
                            <li><a href="ui_elements_nestable.html">Nestable List</a></li>
                        </ul>
					</li>
                </ul>
	';
		}/*************fin estado********************/
		else if($_SESSION['permisos'] == "Facturacion") {
			echo'
		<ul>
                    <li class="has-sub">
                        <a href="principal.php">
                        <i class="icon-home"></i>
                        <span class="title">Inicio</span>
                        </a>
                    </li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-cogs"></i>
                        <span class="title">Actividades</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                           <li><a href="cliente_nuevo.php">Cliente nuevo</a></li>
                        </ul>
					</li>

                     <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-group"></i>
                        <span class="title">Actuaciones</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="crear_usuario.php">Crear usuario</a></li>
                            <li><a href="ui_elements_buttons.html">Ingresar tracking</a></li>

                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-list-alt"></i>
                        <span class="title">Consultas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">D.O</a></li>
                            <li><a href="ui_elements_buttons.html">Tracking</a></li>
                            <li><a href="ui_elements_buttons.html">Facturas de venta</a></li>
                            <li><a href="ui_elements_buttons.html">Cartera</a></li>
                            <li><a href="lista_empleados.php">Empleados</a></li>
                            <li><a href="ui_elements_buttons.html">Clientes</a></li>
                            <li><a href="consulta_proov_logistico.php">Proveedor-Logistico</a></li>
                            <li><a href="consulta_proov_administrativo">Proveedor-Administrativo</a></li>
                            <li><a href="ui_elements_buttons.html">Tarifas de Referencia</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-signal"></i>
                        <span class="title">Estadísticas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html" class="disabled">Cotizaciones Solicitadas</a></li>
                            <li><a href="ui_elements_buttons.html">Cotizaciones Aprobadas</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Cotizaciones por Comercial</a></li>
                            <li><a href="ui_elements_sliders.html">D.O. por Coordinador</a></li>
                            <li><a href="ui_elements_typography.html">Contenedores por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Indicadores</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">Por Proceso</a></li>
                            <li><a href="ui_elements_buttons.html">Por Cliente</a></li>
                        </ul>
					</li>

                    <li class="has-sub">
                        <a onclick="menu(this);">
                        <i class="icon-download"></i>
                        <span class="title">Descargas</span>
                        <span class="arrow  open"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="ui_elements_general.html">General</a></li>
                            <li><a href="ui_elements_buttons.html">Buttons</a></li>
                            <li><a href="ui_elements_tabs_accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui_elements_sliders.html">Sliders</a></li>
                            <li><a href="ui_elements_typography.html">Typography</a></li>
                            <li><a href="ui_elements_tree.html">Tree View</a></li>
                            <li><a href="ui_elements_nestable.html">Nestable List</a></li>
                        </ul>
					</li>
                </ul>
	';
		}/*************fin estado********************/

	}

}
/***************************funcion crear usuario ***********************/
function contenido_crear_usuario() {
	if(isset($_SESSION['permisos'])) {
		$cliente = "Cliente";
		$proovedor_logistico = "Proovedor logistico";
		$proovedor_administrativo = "Proovedor Administrativo";
		if($_SESSION['permisos'] === "Administrador") {
			echo '
				<div class="well">
                          <a style="margin-top:5px; display:block;" href="empleado_nuevo.php"><button type="button"  class="btn btn-large btn-block  btn-primary">Crear Empleado
                          </button>
                          </a>
                          <a style="margin-top:5px; display:block;" href="cliente_nuevo.php?tipo='.base64_encode($cliente).'"><button type="button"  class="btn btn-large btn-block  btn-primary">Crear Cliente
                          </button>
                          </a>
                          <a style="margin-top:5px; display:block;" href="cliente_nuevo.php?tipo='.base64_encode($proovedor_logistico).'"><button type="button"  class="btn btn-large btn-block  btn-primary">Proovedor logistico
                          </button>
                          </a>
                           <a style="margin-top:5px; display:block;" href="cliente_nuevo.php?tipo='.base64_encode($proovedor_administrativo).'"><button type="button"  class="btn btn-large btn-block  btn-primary">Proovedor administrativo
                          </button>
                          </a>
                        </div>
			';
		}
		else if($_SESSION['permisos'] === "Comercial") {
			echo '
				<div class="well">
                          <a style="margin-top:5px; display:block;" href="cliente_nuevo.php?tipo='.base64_encode($cliente).'"><button type="button"  class="btn btn-large btn-block  btn-primary">Crear Cliente
                          </button>
                          </a>
               </div>
			';
		}
        else if($_SESSION['permisos'] === "Pricing") {
            echo '
                <div class="well">
                        <a style="margin-top:5px; display:block;" href="cliente_nuevo.php?tipo='.base64_encode($proovedor_logistico).'"><button type="button"  class="btn btn-large btn-block  btn-primary">Proovedor logistico
                        </button>
                        </a>
                        <a style="margin-top:5px; display:block;" href="cliente_nuevo.php?tipo='.base64_encode($proovedor_administrativo).'"><button type="button"  class="btn btn-large btn-block  btn-primary">Proovedor administrativo
                        </button>
                        </a>
                </div>
            ';
        }
		/**fin if()**/
	}
}

/*=================MENU USER PROFILE =============================*/
function topMenu(){
    echo'
    <li class="">
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="images/img.jpg" alt="">
            '.$GLOBALS["nombreUser"].'
            <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;"> Perfilff</a></li>
            <li>
                <a href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Configuración</span>
                </a>
            </li>
            <li><a href="javascript:;">Help</a></li>
            <li>
                <a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </li>
        </ul>
    </li>
    <li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
        <li>
            <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
            </a>
        </li>
        <li>
          <a>
            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
            <span>
              <span>John Smith</span>
              <span class="time">3 mins ago</span>
            </span>
            <span class="message">
              Film festivals used to be do-or-die moments for movie makers. They were where...
            </span>
          </a>
        </li>
        <li>
          <a>
            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
            <span>
              <span>John Smith</span>
              <span class="time">3 mins ago</span>
            </span>
            <span class="message">
              Film festivals used to be do-or-die moments for movie makers. They were where...
            </span>
          </a>
        </li>
        <li>
          <a>
            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
            <span>
              <span>John Smith</span>
              <span class="time">3 mins ago</span>
            </span>
            <span class="message">
              Film festivals used to be do-or-die moments for movie makers. They were where...
            </span>
          </a>
        </li>
        <li>
          <div class="text-center">
            <a>
              <strong>See All Alerts</strong>
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
        </li>
      </ul>
    </li>';

}
/*=================MENU USER PROFILE =============================*/

/* ==================CARGA DE MENU =============================*/
function sideBarMenu() {
    if($_SESSION['permisosUsuario'] == "Administrador") {
        echo '        
        <li><a href="index.php"><i class="fa fa-home"></i> Home </a>            
        </li>                                    
        <li><a href="ingresoVentas.php"><i class="fa fa-edit"></i> Ingreso </a>            
        </li>
        ';   
    }else if($_SESSION['permisosUsuario'] == "Ventas") {
        echo '        
        <li><a href="index.php"><i class="fa fa-home"></i> Home </a>            
        </li>
        <li><a href="ingresoVentas.php"><i class="fa fa-edit"></i> Ingreso </a>            
        </li>                                    
        ';   
    }else if($_SESSION['permisosUsuario'] == "Financiero") {
        echo '        
        <li><a href="index.php"><i class="fa fa-home"></i> Home </a>            
        </li>
        <li><a href="ingresoVentas.php"><i class="fa fa-check-square"></i>Estudios </a>            
        </li>                                    
        ';   
    }
}
/* ==================CARGA DE MENU =============================*/

/* ==================CARGA DE FOOTER MENU =============================*/
function footerSideBarMenu() {
    echo'
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    ';
}
/* ==================CARGA DE MENU =============================*/

/* ==================CARGA DE ESTILOS =============================*/
function commonStyles() {
    echo'
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">    
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">    
    ';    
}
/* ==================CARGA DE ESTILOS =============================*/

/* ==================CARGA DE SCRIPTS =============================*/
function commonScripts() {
    $urlProduction = $_SERVER['PHP_SELF'];
    // se carga el jquery general para funcionamiento de la web
    echo '
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- MainJs -->    
    <script type="text/javascript" src="build/js/main.js"></script>
    <script src="build/js/custom.js"></script>
    <!-- Validator -->
    <script src="vendors/validator/validator.js"></script>
    ';
    // se carga el jquery general para funcionamiento de la web
    /*echo '            
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>    
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>    
    ';*/
}


/* ==================CARGA DE SCRIPTS =============================*/
?>