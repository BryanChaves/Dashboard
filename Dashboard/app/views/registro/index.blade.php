<h1>Registro</h1>

{{ Form::open(array('url' => 'registro')) }}
	
	<label for="nombre">Nombre:</label>
	{{Form::text('nombre', Input::old('nombre'), array('placeholder' => 'Nombre', 'required' => 'true'))}}
	<br>
	<label for="apellido1">Primer Apellido:</label>
	{{Form::text('apellido1', Input::old('apellido1'), array('placeholder' => 'Primer Apellido', 'required' => 'true'))}}
	<br>
	<label for="apellido2">Segundo Apellido:</label>
	{{Form::text('apellido2', Input::old('apellido2'), array('placeholder' => 'Segundo Apellido', 'required' => 'true'))}}
	<br>
	<label for="correo">Correo:</label>
	{{Form::text('correo', Input::old('correo'), array('placeholder' => 'Correo', 'required' => 'true'))}}
	<br>
	<label for="clave">Contraseña:</label>
	{{ Form::password('clave', array('placeholder' => 'Contraseña', 'class' => 'form-control', 'required' => 'true')) }}
	{{ Form::submit('Login', array())}}

{{ Form::close() }}