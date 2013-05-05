<!DOCTYPE>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>CEYE | Centra Esterilización</title>
		
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/blitzer/jquery-ui-1.9.1.custom.min.css">
		
		<script src="js/jquery-1.8.2.js"></script>
		<script src="js/jquery-ui-1.9.1.custom.min.js"></script>
		<script src="js/core.js"></script>

		<script type="text/javascript">
			var ids = null;
			var cantidad = 0;

			function revisar(numero) {
				$("#dialog").dialog("close");
				createDialogLoad("Cargando...","Por favor, espere... <img src='img/cargar.gif' />" ,true,300);

				$.ajax({
					async: true,
					type: "POST",
					dataType: "html",
					url: "modelo.php",
					data: "revisar=0&cr_ceye="+numero,
					success:function(resultado) {
						$("#dialog_load").dialog("close");
						showInstrumentalOK(resultado,500,"");
					},
					error:function(){
						alert("Huy acaba de ocurrir un error");
					}
				});
			}
 
			//Autocompletar
			$(function() {
				var autocompletar = new Array();
				<?php 
					for($inst = 0; $inst < count($instrumentos); $inst++) {?>
						autocompletar.push('<?php echo utf8_encode($instrumentos[$inst])?>');
					<?php }?>
				
				$("#palabra").autocomplete({
					source : autocompletar
				});
			})
		</script>
	</head>
	<body>
		<header>
			<div id="busqueda">
				<input type="text" id="palabra" name="palabra">
				<input type="button" id="buscar" value="Buscar" onclick="buscar();">	
			</div>
			<div id="logo">
				<p><em>CEyEsterilización</em></p>
			</div>
		</header>
		<div id="tabla">
			<table>
				<tr>
				<?php 
					$numero = 0;
					$token = 0;

					foreach ($casillas as $casillas):
					
					$numero = $numero + 1;
					$token = $token + 1;

					#Imprimir en forma de tabla
					if ($token > 20) {
						print "</tr>";
						print "<tr>";
						$token = 1;
						print "<td style='background-color:".$casillas['color']."' id='casilla_".$casillas['ID_casilla']."' onclick='revisar(".$casillas['numero'].");'><div class='numeracion'>".$casillas['numero']."</div></td>";
					}
					else {
						print "<td style='background-color:".$casillas['color']."' id='casilla_".$casillas['ID_casilla']."' onclick='revisar(".$casillas['numero'].");'><div class='numeracion'>".$casillas['numero']."</div></td>";
					}
				?>
				<?php endforeach; ?>
			</table>
			<div id="dialog"><span id="textMessageOK"></span></div>
			<div id="dialog_load"><span id="textMessageLoad"></span></div>
		</div>
	</body>
</html>