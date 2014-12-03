<h1>Register</h1>


@if ($errors->has())
    <div class="alert-danger text-center" role="alert">
        <small>{{ $errors->first('name') }}</small>
        <small>{{ $errors->first('last_Name1') }}</small>
        <small>{{ $errors->first('last_Name2') }}</small>
        <small>{{ $errors->first('email') }}</small>
        <small>{{ $errors->first('invalid_credentials') }}</small>
    </div>
@endif

{{ Form::open(array('url' => 'registro')) }}
	<label for="name">Name:</label>
	{{Form::text('name', Input::old('Name'), array('placeholder' => ' Name ', 'required' => 'true'))}}
	<br>
	<label for="last_Name1">Last name 2:</label>
	{{Form::text('last_Name1', Input::old('last_Name1'), array('placeholder' => 'Last Name 1', 'required' => 'true'))}}
	<br>
	<label for="last_Name2">Last name 2:</label>
	{{Form::text('last_Name2', Input::old('last_Name2'), array('placeholder' => 'Last Name 2', 'required' => 'true'))}}
	<br>
	<label for="email">Email:</label>
	{{Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'required' => 'true'))}}
	<br>
	<label for="password">Password:</label>
	{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'true')) }}
	<br>
	<label for="confirmation">Confirmation:</label>
	{{ Form::password('confirmation', array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'true')) }}
	<br>

	{{ Form::submit('Login', array())}}
{{ Form::close() }}