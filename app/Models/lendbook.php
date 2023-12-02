<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lendbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_book',
        'id_student',
        'lend_date',
        'return_date',
        'status',
        'id_set_asaide',
    ];

    public function book(){
        return $this->belongsTo(book::class, 'id_book');
    }

    public function student(){
        return $this->belongsTo(students::class, 'id_student');
    }

    public function status(){
        return $this->belongsTo(status::class, 'status');
    }

    public function set_asaide(){
        return $this->belongsTo(Set_asaide::class, 'id_set_asaide');
    }
}
