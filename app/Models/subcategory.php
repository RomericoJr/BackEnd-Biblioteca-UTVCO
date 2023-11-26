<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'subcategory',
    ];


    public function category()
    {
        return $this->belongsTo(category::class, 'id_category');
    }

    public function books()
    {
        return $this->hasMany(book::class, 'id_subcategory');
    }

    public function setAsaides()
    {
        return $this->hasMany(setAsaide::class, 'id_subcategory');
    }

    public function estadias()
    {
        return $this->hasMany(estadias::class, 'id_subcategory');
    }
}
