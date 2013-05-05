<?php
	function ConectarBaseDeDatos($servidor,$usuario,$contraseña) {
		return mysql_connect($servidor,$usuario,$contraseña);
	}

	function CerrarConexion($conexion) {
		mysql_close($conexion);	
	}
	
	function ConsultaBaseDeDatos($consulta,$base_datos,$conexion) {
		mysql_select_db($base_datos,$conexion);

		return mysql_query($consulta,$conexion);
	}

	function getCasilla() {
		$conexion = ConectarBaseDeDatos('localhost','root','3412954');
		$resultado = ConsultaBaseDeDatos('select * from casilla','cr_ceye',$conexion);

		$casillas = array();

		while ($reg = mysql_fetch_array($resultado)) {
			$casillas[] = $reg;
		}

		CerrarConexion($conexion);

		return $casillas;
	}	

	function getInstrumentos() {
		$conexion = ConectarBaseDeDatos('localhost','root','3412954');
		$resultado = ConsultaBaseDeDatos('select * from producto','cr_ceye',$conexion);

		$instrumentos = array();

		if (mysql_num_rows($resultado) == 0) {
			array_push($instrumentos, "No hay datos");
		}

		else {
			while ($reg = mysql_fetch_array($resultado)) {
				array_push($instrumentos, strtoupper($reg['nombre']));
			}
		}

		return $instrumentos;
	}
?>