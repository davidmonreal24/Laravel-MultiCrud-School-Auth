<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $id
 * @property $nombre
 * @property $apellido_p
 * @property $apellido_m
 * @property $clave
 * @property $created_at
 * @property $updated_at
 *
 * @property Calificacione[] $calificaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido_p' => 'required',
		'apellido_m' => 'required',
		'clave' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido_p','apellido_m','clave'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calificaciones()
    {
        return $this->hasMany('App\Models\Calificacione', 'id_alumno', 'id');
    }
    

}
