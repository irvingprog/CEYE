<?php
	/*
	Creditos:

	Idea - Eduardo Angeles Godinez
	Desarrollo - Irving Rodríguez
	Carlos Monge
	*/

	#Modelo
	include('modelo.php');

	#Casillas por numero
	$casillas = getCasilla();
	
	#funcion autocompletar para usar desde jquery
	$instrumentos = getInstrumentos();

	#Vista de la página
	include('vista.php');
?>