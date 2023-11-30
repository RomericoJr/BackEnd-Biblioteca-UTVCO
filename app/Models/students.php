<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname_father',
        'lastname_mother',
        'matricula',
        'phone',
        'email',
        'password',
        'id_genere',
        'id_carrers',
        'status'
    ];



    public function genere()
    {
        return $this->belongsTo(genere::class, 'id_genere');
    }

    public function carrer()
    {
        return $this->belongsTo(carrer::class, 'id_carrers');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_students');
    }

    public function estadias()
    {
        return $this->hasMany(estadias::class, 'id_students');
    }

    public function prestamos()
    {
        return $this->hasMany(prestamos::class, 'id_students');
    }

    public function set_asaides()
    {
        return $this->hasMany(set_asaides::class, 'id_students');
    }


}
