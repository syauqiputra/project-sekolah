<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'id',
        'name',
    ];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function study()
    {
        return $this->hasMany(Study::class);
    }
}
