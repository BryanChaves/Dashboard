<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{HTML::script('assets/js/jquery-2.1.1.min.js')}}
	{{HTML::style('assets/css/bootstrap.min.css',array('media'=>'screen'))}}
	{{HTML::style('assets/css/index.css',array('media'=>'screen'))}}
	{{HTML::style('assets/css/bootstrap.min.css')}}
</head>
<body>

	<div id="marco">	
			<marquee id="marco2">
				<h1 id="Principal">Dashboard</h1>
			</marquee>
	</div>	
	
	<?php
		if (Auth::check()) {
			echo "<a id='cerrar' href='logout'>Cerrar Session</a>";echo("<br>");
			$nombre = Auth::user()->name;
			$apellido1=Auth::user()->last_name1;
			$apellido2=Auth::user()->last_name2;
			$nombreCompleto=$nombre." ".$apellido1." ".$apellido2;
			echo("<h3>Bienvenido:". " ".$nombreCompleto."</h3>");
		}
	?>
	{{ $content }}

	{{HTML::script('assets/js/bootstrap.min.js')}}
	{{HTML::script('assets/js/index.js')}}


</body>

</html>



