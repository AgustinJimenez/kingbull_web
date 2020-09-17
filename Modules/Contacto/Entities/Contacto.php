<?php namespace Modules\Contacto\Entities;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto__contactos';
    protected $fillable = [
      'direccion',
      'email',
      'telefono'
    ];
}
