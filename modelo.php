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

	function getNumeroCasilla() {
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

	function getDatosCasilla() {
		if (isset($_POST['revisar'])) {
			$casillero = $_POST['numero'];
			$conexion = ConectarBaseDeDatos('localhost','root','3412954');
			$resultado = ConsultaBaseDeDatos("select * from producto where ID_casilla='".$casillero."'","cr_ceye",$conexion);
			
			while($reg = mysql_fetch_array($resultado)) {
				print "<p>".$reg["cantidad"]." ".utf8_decode(strtoupper($reg["nombre"]))."</p>";

				if($reg['imagen']!=""){
					print "<img src='".$reg['imagen']."'/>";
				}
				else {
					print "Imagen N/A";
				}

			}
		}
	}

	function BusquedaPorCasilla() {
		if (isset($_POST['buscar'])) {
			$palabra = $_POST['palabra'];
			$conexion = ConectarBaseDeDatos('localhost','root','3412954');
			$resultado = ConsultaBaseDeDatos("select * from producto where nombre like '%".$palabra."%'","cr_ceye",$conexion);
		
			while ($reg = mysql_fetch_array($resultado)) {
				print $reg["ID_casilla"]."|-|";
			}
		}
	}

	#Obtener contenido de casilla
	getDatosCasilla();
	BusquedaPorCasilla();
?>