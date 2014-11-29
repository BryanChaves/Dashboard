<h3>Edit Task</h3>

{{ Form::open(array('url' => "Tasks/$tarea->id/update")) }}
	{{ Form::label('task', 'Task') }}
	{{ Form::text('task', $tarea->task) }}
	<br>
	{{ Form::label('description', 'Description') }}
	{{ Form::textArea('description', $tarea->description) }}
	<br>
	{{Form::submit('Salvar', array())}}

{{ Form::close() }}