<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once('php/inclusiones.php');
require_once('php/verificar.php');
open_login();

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<head>
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css">
<link href="css/font-awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Financiamiento Boxisleep</title>
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="css/componentes_css/js/bootstrap.js"></script>
<script type="text/javascript">


$(document).ready(function(e) {		
		
		$(".ocultarWidget").ocultarWidget();	

    refresca_principal();
    setInterval(refresca_principal,10000);

    escalado();

});	
$(window).resize(function(e) {  
	escalado();
});


</script>
</head>
<body>

<div id="contenedor">
  <?
  echo '<input type="hidden" id="permisos" value="'.$_SESSION['permisos'].'">';
  ?>
	<? include "inc/header.php" ?>
<section id="main"> 
       	
 	<nav>
        	<div id="info_profile">
            	<?
				info_profile();
				?> 
      		</div>       
            
            <div id="menu">
            	<?
				menu_principal();
				?>              	
          </div>
          
    </nav>
 	<hr class="sin-margen divisor1" />     
        
    <article id="central" class="row-fluid">
        
   	  <div id="titulo" class="row-fluid">
        <h3><img src="img/logo.png"/></h3>
        <div id="iconos_login">                
          <?
		  menu_login();
		  ?>                    
        </div>
      </div>
      <div id="clear"></div>   
                    
      <ul class="navegacion_web breadcrumb">
                <li>
                	<i class="icon-home"></i>
                    <a href="#">Inicio</a>                    
                </li>                            
            </ul>
           <div id="clear"></div>                    
                        
      <div class="row-fluid margen">
            	<small class="label_gene">Filtrado por :</small>
                <select>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <button class="btn" type="button">Filtrar</button>        
            </div>
            <div id="clear"></div>
            
            <div class="row-fluid">            
                <div class="span12">
                	<div class="widget">
                    	<div class="widget-title">
                        	<h4>
                           	<i class="icon-th-list"></i> Operaciones <? echo $_SESSION['permisos'] ?></h4>
                            <span class="tools">
                           		<a class="ocultarWidget icon-chevron-down"></a> 
                            	<a class="icon-refresh"></a>                               
                           </span>
                        </div>
                        <div class="widget-body" id="caja_principal">
                        	      	
                        </div>
                    </div>
                </div>
        </div>
            <div id="clear"></div><!--fin div span12 -->
            
            <div class="row-fluid sin-margen">
                <hr />            
          </div>
            <div id="clear"></div>    
            
            <div class="row-fluid sin-margen">
                <div class="span4 contenedor-widget hover-widget"></div> 
                <div class="span4 contenedor-widget hover-widget"></div>
                <div class="span4 contenedor-widget hover-widget"></div>                
          </div><!--fin div span 6-->
            <div id="clear"></div>
            
        </article>
        <div id="clear"></div>
        
        
    </section>  
</div>  
<!--/*<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>*/-->

<script type="text/javascript">
	//apenas termine de cargar el contenido escale porque no escala automaticamente con el ready.
	escalado();
</script>
 
</body>

</html>