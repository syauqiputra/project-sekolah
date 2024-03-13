<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Study extends Model
{
    use HasFactory;
    protected $table = 'study_schedule';
    protected $fillable = [
        'id',
        'id_teacher',
        'id_kelas',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher');    
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');    
    }
}
