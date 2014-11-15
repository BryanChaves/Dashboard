<?php
class Tarea extends Eloquent {
	protected $table = 'tareas';
	protected $fillable = array('id_Usuario', 'tarea','estado');
	protected $guarded  = array('id');
	public    $timestamps = false;

	


	static public function Ventas()
	{
		return DB::select("select ve.nombre, count(*) as numero
							from vendedor ve, venta v
							where v.vehiculo_id = ve.id
							group by ve.nombre");
	}
}