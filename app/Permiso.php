<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model {

    protected $table = 'permisos';
    protected $fillable = ['usuario_id', 'rol_id'];

}
