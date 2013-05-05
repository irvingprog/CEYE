function showInstrumentalOK(msg,ancho,funciones){
	tipomodal = false
	$("#textMessageOK").html(msg);
	$("#dialog").dialog({
		resizable: false,
		width: ancho,
		autoOpen: true,
		buttons: {
			"Aceptar": function() {
			$(this).dialog("close");
			eval(funciones);
			}
		}
	});
};

function noResultadosOK(titulo,msg,ancho,funciones){
	tipomodal = false
	$("#noresultados").attr("title",titulo);
	$("#noresultadosOK").html(msg);
	$("#noresultados").dialog({
		resizable: false,
		width: ancho,
		autoOpen: true,
		buttons: {
			"Aceptar": function() {
			$(this).dialog("close");
			eval(funciones);
			}
		}
	});
};

function campoVacioOK(titulo,msg,ancho,funciones){
	tipomodal = false
	$("#campovacio").attr("title",titulo);
	$("#campovacioOK").html(msg);
	$("#campovacio").dialog({
		resizable: false,
		width: ancho,
		autoOpen: true,
		buttons: {
			"Aceptar": function() {
			$(this).dialog("close");
			eval(funciones);
			}
		}
	});
};

function createDialogLoad(titulo,msg,tipomodal,ancho){
	tipomodal = false
	$("#dialog_load").attr("title",titulo);
	$("#textMessageLoad").html(msg);
	$("#dialog_load").dialog({
		resizable: false,
		width: ancho,
		autoOpen: true,
		modal: tipomodal
	 });
}

$.fx.speeds._default = 300;	
$(function(){		
	$("#dialog").attr("title","Instrumental");
	$("#dialog").dialog({
		autoOpen: false,
		show: "blind",
		hide: "explode"
	});
});
