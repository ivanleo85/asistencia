<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model {

    protected $table = 'accesos';
    protected $fillable = ['rol_id', 'menu_id'];

}
