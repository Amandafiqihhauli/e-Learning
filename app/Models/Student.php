<?php

namespace App\Models;

use App\Http\Controllers\CoursesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // mendefinisikan field yg boleh diisi
    protected $fillable = ['name', 'nim', 'class', 'major', 'courses_id'];

/**
 * Laravel relationship method:
 * 1. one to one
 *    - hasOne()        = tabel saat ini meminjamkan id
 *    - belongsTo()     = tabel saat ini MEMINJAM id ke tabel lain
 * 
 * 2. one to many/mane to one
 *    - hasMany()       = tabel saat ini meminjamkan id
 *    - belongsToMany() = tabel saat ini MEMINJAM id ke tabel lain
 */


    // mendefinisakan relasi ke model course
    public function courses(){
        return $this->belongsTo(Courses::class, 'courses_id');
    }
}
