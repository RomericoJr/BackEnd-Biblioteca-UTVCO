<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadias extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'copias',
        'carrer_id'
    ];

    public function carrer(){
        return $this->belongsTo(Carrer::class);
    }

}
