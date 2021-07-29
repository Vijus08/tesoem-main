<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="styles/vistas-style/login_style.css">
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="styles/global.css">



	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('/img/logfav.png') }}">


	<!-- Title pestaña navegador -->
	<title>Entrar</title>

	<!-- style icon font awesome -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>
	<!-- Loader -->
	<div id="contenedor_carga">
		<div id="carga"></div>
	</div>

	<section class="section-login">
		<p class="titles ">Bienvenido</p>
		<div class="content-form">
			<form method="POST">
				{{csrf_field()}}

				<label>Matricula</label>
				<br />
				<input type="text" />
				<br />
				<label>Contraseña</label>
				<br />
				<input type="password" />
				<br />

				<input class="btn-login" type="submit" value="Entrar" />
				<br />
				<p class="text-info-log">
					si aún no estas registrado

					<br />
					<a href="/registro">Click Aquí</a>
				</p>



			</form>

		</div>

	</section>

	<script>
		window.onload = function() {
			var contenedor = document.getElementById("contenedor_carga");
			console.log("hola");
			contenedor.style.visibility = "hidden";
			contenedor.style.opacity = "0";
		}
	</script>
</body>

</html>