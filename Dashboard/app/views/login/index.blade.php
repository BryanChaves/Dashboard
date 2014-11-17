<div id="login">

<h1>Login</h1>

@if ($errors->has())
    <div class="alert-danger text-center" role="alert">
        <small>{{ $errors->first('email') }}</small>
        <small>{{ $errors->first('password') }}</small>
        <small>{{ $errors->first('invalid_credentials') }}</small>
    </div>
@endif
{{ Form::open(array('url' => 'login')) }}

	<label for="correo">Correo:</label>
	{{Form::text('correo', Input::old('correo'), array('placeholder' => 'Correo', 'required' => 'true'))}}
	<br>
	<label for="clave">Contraseña:</label>
	{{ Form::password('clave', array('placeholder' => 'Contraseña', 'class' => 'form-control', 'required' => 'true')) }}
	{{ Form::submit('Login', array())}}
	
{{ Form::close() }}




</div>