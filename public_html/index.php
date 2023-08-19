<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="favicon.png">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title id="titulo">Congreso FESC</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="./styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
</head>

<body>
	<header class="fixed-top">
		<?php
		$index = true;
		require_once('Layouts/nav.php');
		?>
	</header>


	<section style="margin-top: 210px;">

		<?php
		require_once('Layouts/banner.php');
		?>
		<?php
		require_once('Layouts/fechas.php');
		?>
	</section>
	<section>
		<?php
		require_once('Layouts/carrusel.php');
		?>
	</section>
	<section>
		<?php
		require_once('Layouts/maps.php');
		?>
	</section>

	<footer>
		<?php
		require_once('Layouts/footer.php');
		?>
	</footer>


	<script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<script defer src="./index.js"></script>
	<script src="https://kit.fontawesome.com/c7b1d2a865.js" crossorigin="anonymous"></script>
</body>

</html>