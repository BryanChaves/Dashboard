<?php

class Task extends Eloquent
{
	protected $table = 'tasks';
	protected $fillable = array('id_user', 'task','status','description');
	protected $guarded  = array('id');
	public    $timestamps = false;


	static public function tareasUsuario($id)
	{
		return DB::select("select t.id,t.id_user,t.task,t.status,t.description
							from tasks t,users u
							where t.id_user=u.id and u.id=".$id);
	}
}