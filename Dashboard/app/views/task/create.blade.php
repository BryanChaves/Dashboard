<h3>Nuevo Tarea</h3>

{{ Form::open(array('url' => 'create')) }}
	{{ Form::label('titulo', 'Titulo:') }}
	{{ Form::text('task', '') }}
	{{ Form::label('status', 'Estado:') }}
	<input type="text" id="status" name="status" value="nueva" readonly>
	
	<br>
	{{ Form::label('description', 'Descripcion') }}<br>
	{{ Form::textArea('description', '') }}
	<br>
	<a href="tasks">Cancelar</a>
	{{Form::submit('Salvar', array())}}

{{ Form::close() }}