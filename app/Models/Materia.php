<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia
 *
 * @property $id
 * @property $nombre
 * @property $maestro
 * @property $created_at
 * @property $updated_at
 *
 * @property Calificacione[] $calificaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materia extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'maestro' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','maestro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calificaciones()
    {
        return $this->hasMany('App\Models\Calificacione', 'id_materia', 'id');
    }
    

}
