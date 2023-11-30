<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'title',
        'author',
        'editorial',
        'edition',
        'stock',
        'id_category',
        'id_subcategory',
    ];

    public function category(){
        return $this->belongsTo(category::class, 'id_category');
    }

    public function subcategory(){
        return $this->belongsTo(subcategory::class, 'id_subcategory');
    }

    public function estadias(){
        return $this->hasMany(estadias::class, 'id_book');
    }

    public function set_asaide(){
        return $this->hasMany(set_asaide::class, 'id_book');
    }

    public function prestamos(){
        return $this->hasMany(prestamos::class, 'id_book');
    }

    public function reservaciones(){
        return $this->hasMany(reservaciones::class, 'id_book');
    }

    public function devoluciones(){
        return $this->hasMany(devoluciones::class, 'id_book');
    }

    public function historial(){
        return $this->hasMany(historial::class, 'id_book');
    }
}
