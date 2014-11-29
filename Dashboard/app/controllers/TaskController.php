<?php

class TaskController extends \BaseController {

	protected $layout = 'layouts.default';
	public function index()
	{
		$this->layout->content = View::make('task.index');
	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function traerTareas()
	{

		if (Auth::check()) {
			$id = Auth::user()->id;
			$tareas = Task::tareasUsuario($id);
			return Response::Json($tareas);
		}


		

	}

	public function create()
	{
		//$this->layout->content = View::make('task.create');
		$this->layout->nest(
			'content',
			'task.create',
			array()
		);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$id = Auth::user()->id;
		
		$task = Input::get('task');
		$status = Input::get('status');
		$description = Input::get('description');
		$tasks = new Task();
		$tasks->id_user = $id;
		$tasks->task = $task;
		$tasks->status = $status;
		$tasks->description = $description;
		$tasks->save();
		return Redirect::to('tasks');		

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	public function actualizarEstado()
	{
		$id=Input::get("id");
		$status=Input::get("status");
		$tasks = Task::find($id);
		$tasks->status = $status;
		$tasks->save();
		return Redirect::to('tasks');

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tarea = Task::find($id);
		$this->layout->nest(
			'content',
			'task.edit',
			array(
				'tarea' => $tarea
			)
		);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$task = Input::get('task');
		$description = Input::get('description');
		
		$tasks = Task::find($id);
		$tasks->task = $task;
		$tasks->description = $description;
		$tasks->save();
		return Redirect::to('tasks');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tasks = Task::find($id);
		$tasks->delete();
		return Redirect::to('tasks');
	}


}
