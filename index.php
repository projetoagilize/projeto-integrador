<!DOCTYPE html>
<html>
	<head>
		<meta charset ="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
		<title>Projeto Integrador - Agilize</title>
	</head>
	<body>
		<header>
			<h1>Agilize</h1>
		</header>
		<div class="container-fluid">
			<br />
			<center><h4>Sistema de Requisições</h4></center>
			<section class="card-body">
				<fieldset class="card animated zoomIn myForm">
					<?php
						if (isset($_GET['pg']) == "")
						{
							$_GET['pg'] = "search";
						}
						else if ( ( substr($_GET['pg'],0,4) == "http" || substr($_GET['pg'],0,3) == "ftp" ) )
						{
							$_GET['pg'] = "deny";
						}
							$_GET['pg'].= ".php";
							include($_GET['pg']);
					?>
				</fieldset>
			</section>
		</div>
		<footer class="navbar fixed-bottom">
			<p>Projeto Integrador Univesp - Agilize</p>
		</footer>
	</body>
</html>