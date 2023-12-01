<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class set_asaide extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_book',
        'id_student',
        'date_set_asaide',
        'status',
    ];

    public function book(){
        return $this->belongsTo(Book::class, 'id_book');
    }

    public function student(){
        return $this->belongsTo(students::class, 'id_student');
    }


}
