// document funciones 
// funcion carga de modales para el funcionamiento de la app
var cajaModal;
var bodyModal;
var footerModal;
function carga_modales() {
	var html_modal ='<div class="modal fade" tabindex="-1" role="dialog" id="caja_modal">'+
						'<div class="modal-dialog" role="document">'+
							'<div class="modal-content">'+
								'<div class="modal-header">'+
									'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									'<h4></h4>'+
								'</div>'+
								'<div class="modal-body">'+
								'</div>'+
								'<div class="modal-footer">'+
									'<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>'+
								'</div>'+
							'</div><!-- /.modal-content -->'+
						'</div><!-- /.modal-dialog -->'+
					'</div>';
	var html_alert ='<div style="z-index:10000" class="modal hide fade" id="caja_alert">'+
							'<div class="modal-header">'+
								'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
								'<h3>Modal header</h3>'+
							'</div>'+
							'<div class="modal-body">'+
							'</div>'+
							'<div class="modal-footer">'+
							'</div>'+
					'</div>';
	$("body").prepend(html_modal);
	$("body").prepend(html_alert);
	cajaModal = $("#caja_modal");
	bodyModal = cajaModal.find(".modal-body");
	footerModal = cajaModal.find(".modal-footer");	
}
carga_modales();
function Modals(mensaje,tamaño){	
	bodyModal.text(mensaje);
	cajaModal.modal();
	if(tamaño == "small"){
		cajaModal.find('.modal-dialog').addClass('modal-sm');
	}	
    cajaModal.on("hidden.bs.modal",function(){
    	cajaModal.find('.modal-dialog').removeClass('modal-sm');
    	bodyModal.empty();
    });
}
/**************************funcion para confirmar procesos ***********************************/
(function($) {
	var opciones = {
		mensaje: "Seguro realizaras esta accion",
		onConfirmacion : function() {},
		onCancelacion : function() {}
	}
	$.fn.jConfirmacion = function (o) {
		if (o) {
			$.extend(opciones,o);
		}
		bodyModal.text(opciones.mensaje);		
		bodyModal.append(html);		
		var html = '<button id="btn_confirmar" class="btn btn-primary">Aceptar</button><button id="btn_cancelar" class="btn" data-dismiss="modal">Cancelar</button>'		
		cajaModal.modal();
		footerModal.html(html)

		cajaModal.on("hidden.bs.modal",function(){
	    	cajaModal.find('.modal-dialog').removeClass('modal-sm');
	    	bodyModal.empty();
	    	footerModal.html('<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>')
	    });
		$("#btn_confirmar").click(function(e){
			$("#caja_alert").modal('hide');
			opciones.onConfirmacion.call(this);
		})
		$("#btn_cancelar").click(function(e){
			opciones.onCancelacion.call(this);
		})
	}
})(jQuery);
/********************************************************************************/
function Alerts(clase,mensaje) {
	htmlalertas ='<div id="alertasMensajes">'+
					'<div class="alert alert-'+clase+' alert-dismissible fade in" role="alert">'+
	                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>'+
	                    '</button>'+
	                    '<div id="mensajeAlert">'+mensaje+'</div>'+
	                '</div>'+
				'</div>';
	return htmlalertas;
}
// fin de funcion de carga de los modales 


//ajax login inicial
$("#loginBtnForm").click(function(e){	
	e.preventDefault();
	var datosFormLogin = $("#formLogin").serialize();
	var usuario = $("#usuario_login_admin");
	var password = $("#pass_login_admin");
	if(usuario.val() != "" && password.val() != "") {		
		$.post("./build/php/login.php",datosFormLogin,function(r) {
			var query = r;
			if(query == "success") {
				location.href = "./dashboard.php";
			}
			else if(query == "usuario no encontrado") {
				Modals("Usuario o Contraseña incorrectos",'small');				
			}
			else if(query == "login falso") {
				Modals("Ocurrio un error, rectifica los datos y reintenta",'small');								
			}
		})
	}else {
		var alertaLogin = Alerts('error','Completa todos los campos');
		$('.errorLogin').html(alertaLogin);
	}
});


// ===================== feedback de datos principales ================================ //

// ===================== feedback de datos principales ================================ //


/********* funcion para recargar datos principales *********************/
function refrescarPrincipal(){
	var accion = "true";
	$.post("./build/php/refrescarPrincipal.php",{accion:accion},function(r){
		var query = r;
		$("#infoPrincipal").html(query);
	});
}
/********* fin funcion para recargar datos principales ******************/


/******** formulario de ingreso de ventas datos de financiamiento ************/ 
$("#formIngresoVentas").submit(function(e){
	var form = $(this);
	e.preventDefault();
	if (validator.checkAll($(this))) {
		var datosForm = $("#formIngresoVentas").serialize();
		$.post("./build/php/InLeadFi.php",datosForm,function(r) {
			var query = r;
			if(query == "usuario encontrado") {
				var htmlAlert = Alerts('error',"Usuario encontrado");				
				$(".alertError").html(htmlAlert);
			}
			else if(query == "1" || query == "11") {
				if(query == "11") {
					var alertaLogin = Alerts('success','Lead guardado y enviado correo para contacto');
				}else {
					var alertaLogin = Alerts('success','Lead guardado en etapa de financiación');
				}				
				$('.alertError').html(alertaLogin);
				form[0].reset();								
			}
		})
	}	
});
/****** fin formulario de ingreso de ventas datos de financiamiento ************/ 

/******** formulario de ingreso de ventas datos de financiamiento ************/ 

// boton de aprobado de vistaleadFinanciamiento
$("#FinanAprobado").click(function(e){
	e.preventDefault();
	var idFinan = $("#idFin").val();
	var resultado = 'aprobado';
	var nombre = $("#nombre").text();
	var email = $("#email").text();
	var datos = {idFinan:idFinan,resultado:resultado,nombre:nombre,email:email};
	$(this).jConfirmacion({
		mensaje: "¿Esta seguro de aprobar este estudio?",
		onConfirmacion: function() {			
			$.post("./build/php/resFinanciero.php",datos,function(r) {
				var query = r;
				if(query == "success") {
					var alertaFinanciero = Alerts('success','Lead guardado en etapa de financiación');
					Modals("Usuario o Contraseña incorrectos",'small');				
				}
				else if(query == "success") {
					var alertaLogin = Alerts('success','Lead guardado en etapa de financiación');
					$('.alertError').html(alertaLogin);
					form[0].reset();				
				}
			});			
		}
	}); 	
});
// boton de rechazado de vistaleadFinanciamiento
$("#FinanRechazado").click(function(e){
	e.preventDefault();
	var idFinan = $("#idFin").val();
	var resultado = 'rechazado';
	var nombre = $("#nombre").text();
	var email = $("#email").text();
	var datos = {idFinan:idFinan,resultado:resultado,nombre:nombre,email:email};
	$(this).jConfirmacion({
		mensaje: "¿Esta seguro de rechazar este estudio?",
		onConfirmacion: function() {			
			$.post("./build/php/resFinanciero.php",datos,function(r) {
				var query = r;
				if(query == "success") {
					var alertaFinanciero = Alerts('success','Lead guardado en etapa de financiación');
					Modals("Usuario o Contraseña incorrectos",'small');				
				}
				else if(query == "success") {
					var alertaLogin = Alerts('success','Lead guardado en etapa de financiación');
					$('.alertError').html(alertaLogin);
					form[0].reset();				
				}
			});			
		}
	}); 	
});
// boton de rechazado de vistaleadFinanciamiento
$("#FinanCredimio").click(function(e){
	e.preventDefault();
	var idFinan = $("#idFin");
	$(this).jConfirmacion({
		mensaje: "¿Este estudio ira a proceso en credimio?",
		onConfirmacion: function() {

		}
	}); 			
});
/****** fin formulario de ingreso de ventas datos de financiamiento ************/ 