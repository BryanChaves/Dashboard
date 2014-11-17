<?php
class Usuario extends Eloquent {
	protected $table = 'usuarios';
	protected $fillable = array('nombre','apellido1','apellido2','correo', 'clave');
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