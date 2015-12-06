<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $table = 'menus';
    protected $fillable = ['nombre', 'ruta', 'icono', 'estado', 'orden', 'menu_id'];

    public function setNombreAttribute($value){
        $this->attributes['nombre'] = ucfirst($value);
    }
}