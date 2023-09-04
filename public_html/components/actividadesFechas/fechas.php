<?php
session_start();
require '../../modelo/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="../../favicon.png">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fechas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="../../styles.css">
	<link rel="stylesheet" href="./fechas.css">

</head>

<body>
	<header class="fixed-top"> <!--------------MANDA A LLAMAR LA NAVBAR--------------->
		<?php
		require_once('../../Layouts/nav.php');
		?>
	</header>
	<section style="margin-top: 250px;">
		<div class="container-fluid mt-5 mb-5"><!----------CONTENEDOR PRINCIPAL----------->
			<div class="row">
				<div class="col-xl-2 col-lg-2 col-md-1 d-none d-sm-block"></div>
				<div class="col-xl-10 col-lg-10 col-md-10 d-sm-block col-sm-12">
					<div class="container mb-5">
						<h2 class="mb-4">Fechas</h2><!--------TITULO INTERNO------------>
						<div class="row">
							<div class="col-xl-8 col-lg-8 col-md-8 d-sm-block col-sm-12">
								<p class="mt-3 ms-3 titulo-congreso" id="edicion">XVI Edición</p>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 mb-4">
								<img src="../../src/logos_congresos/XV.jpeg" alt="XIV Congreso" class="logo" height="70px" width="80px">
							</div>
							<span class="ms-3 span-congreso d-flex mb-4">Congreso Internacional Sobre la Enseñanza y Aplicación de las Matemáticas</span>
						</div>
						<div class="card-alert rounded p-2">
							Fechas sujetas a cambio
						</div>
						<table class="table">
							<thead class="categorias">
								<th class="fecha py-2" scope="col" width="20%">Fecha inicio</th>
								<th class="fecha py-2" scope="col" width="20%">Fecha fin</th>
								<th class="asunto py-2" scope="col" width="70%">Asunto</th>
								</tr>
							</thead>
							<tbody>
								<tr>


									<!--------RECEPCION DE RESUMENES DE TRABAJOS------------>
									<!--------fecha incio------------>
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 2;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<!--------fecha fin------------>
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 2;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>
									<!--------Asunto------------>
									<td class="asunto py-3">
										<?php
										$id_evento = 2;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>


									<!--------Evaluación de resúmenes por parte del comité------------>
								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 3;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 3;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 3;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>


								<!--------Resultado de evaluación de resúmenes------------>
								<th class="fecha py-3" scope="row">
									<?php
									$id_evento = 4;
									$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
									$result = $conexion->query($sql);
									$row = $result->fetch_assoc();
									$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
									echo $fecha_inicio;
									?>
								</th>

								<!--------fecha fin------------>
								<th class="fecha py-3" scope="row">
									<?php
									$id_evento = 4;
									$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
									$result = $conexion->query($sql);
									$row = $result->fetch_assoc();
									$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
									echo $fecha_inicio;
									?>
								</th>
								<!--------Asunto------------>
								<td class="asunto py-3">
									<?php
									$id_evento = 4;
									$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
									$result = $conexion->query($sql);
									$row = $result->fetch_assoc();
									echo $row["descripcion_evento"]; ?>
								</td>

								<!--------	Recepción de corrección de resúmenes------------>
								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 5;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 5;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 5;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>

								<!--------Aviso------------>
								<tr class="table bg-danger">
									<td class="importante" colspan="3"><i class="fa fa-exclamation-triangle me-3" aria-hidden="true"></i>Si su resumen no fue aprobado al
										<?php
										$id_evento = 5;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();

										$fecha = new DateTime($row["fecha_congreso_fin"]);
										$locale = 'es_ES'; // Establece la configuración regional en español

										$dateFormatter = new IntlDateFormatter(
											$locale,
											IntlDateFormatter::FULL, // Estilo completo de fecha y hora
											IntlDateFormatter::FULL, // Estilo completo de fecha y hora
											'UTC', // Zona horaria
											IntlDateFormatter::GREGORIAN
										);

										$dateFormatter->setPattern("EEEE d 'de' MMMM 'de' y"); // Define el patrón de formato

										$fecha_formateada = $dateFormatter->format($fecha);

										echo $fecha_formateada;
										?> quedará fuera del evento.</td>
								</tr>

								<!----Recepción de trabajos en extenso---->

								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 6;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 6;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 6;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>


								<!---Notificación de observaciones de los trabajos en extenso--->
								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 7;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 7;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 7;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>


								<!---	Inicia el periodo de recepción de pagos--->
								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 8;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 8;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 8;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"];
										?>
									</td>
								</tr>

								<!---	Recepción de videos de las ponencias aceptadas--->
								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 9;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 9;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 9;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>

								<!-- Aviso -->
								<tr class="table bg-danger">
									<td class="importante" colspan="3"><i class="fa fa-exclamation-triangle me-3" aria-hidden="true"></i>Si su extenso no fue aprobado para el
										<?php
										$id_evento = 9;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();

										$fecha = new DateTime($row["fecha_congreso_fin"] . "+3 days");
										$locale = 'es_ES'; // Establece la configuración regional en español

										$dateFormatter = new IntlDateFormatter(
											$locale,
											IntlDateFormatter::FULL, // Estilo completo de fecha y hora
											IntlDateFormatter::FULL, // Estilo completo de fecha y hora
											'UTC', // Zona horaria
											IntlDateFormatter::GREGORIAN
										);

										$dateFormatter->setPattern("EEEE d 'de' MMMM 'de' y"); // Define el patrón de formato

										$fecha_formateada = $dateFormatter->format($fecha);

										echo $fecha_formateada;
										?> quedará fuera del evento.</td>
								</tr>

								<!---Recepción de videos de las ponencias aceptadas--->

								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 10;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 10;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 10;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>

								<!-- Aviso -->

								<tr class="table bg-danger">
									<td class="importante" colspan="3"><i class="fa fa-exclamation-triangle me-3" aria-hidden="true"></i>Si su video no fue recibido para el
										<?php
										$id_evento = 10;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();

										$fecha = new DateTime($row["fecha_congreso_fin"]);
										$locale = 'es_ES'; // Establece la configuración regional en español

										$dateFormatter = new IntlDateFormatter(
											$locale,
											IntlDateFormatter::FULL, // Estilo completo de fecha y hora
											IntlDateFormatter::FULL, // Estilo completo de fecha y hora
											'UTC', // Zona horaria
											IntlDateFormatter::GREGORIAN
										);

										$dateFormatter->setPattern("EEEE d 'de' MMMM 'de' y"); // Define el patrón de formato

										$fecha_formateada = $dateFormatter->format($fecha);

										echo $fecha_formateada;
										?> quedará fuera del evento.</td>
								</tr>

								<!---Publicación del programa general del evento--->

								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 11;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 11;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 11;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>


								<!---Periodo de impartición de talleres en línea--->

								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 12;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 12;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 12;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>



								<!---Fecha del Congreso--->

								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 13;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 13;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 13;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>


								<!---Inicia el envío de constancias virtuales--->


								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 14;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 14;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 14;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>


								<!---Publicación de las memorias del Congreso--->

								</tr>
								<tr class="table-warning">
									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 15;
										$sql = "SELECT fecha_congreso_inicio FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_inicio"]));
										echo $fecha_inicio;
										?>
									</th>

									<th class="fecha py-3" scope="row">
										<?php
										$id_evento = 15;
										$sql = "SELECT fecha_congreso_fin FROM fecha_congreso WHERE id_evento = $id_evento AND id_congreso = (SELECT MAX(id_congreso) FROM fecha_congreso WHERE id_evento = $id_evento)";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										$fecha_inicio = date("d/m/Y", strtotime($row["fecha_congreso_fin"]));
										echo $fecha_inicio;
										?>
									</th>

									<td class="asunto py-3">
										<?php
										$id_evento = 15;
										$sql = "SELECT descripcion_evento FROM evento WHERE id_evento = $id_evento";
										$result = $conexion->query($sql);
										$row = $result->fetch_assoc();
										echo $row["descripcion_evento"]; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<section>
					<?php
					require_once('../../Layouts/maps.php');
					?>
				</section>
			</div>
		</div>

	</section>

	<footer><!-----------CONTENEDOR PIE DE PAGINA------------>
		<?php
		require_once('../../Layouts/footer.php');
		?>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
</body>

</html>
