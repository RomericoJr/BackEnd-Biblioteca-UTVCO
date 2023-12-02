<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function lendbook(){
        return $this->hasMany(lendbook::class);
    }

    public function set_asaide(){
        return $this->hasMany(Set_asaide::class);
    }


}
