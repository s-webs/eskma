<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_kz',
        'name_ru',
        'name_en',
    ];

    public function educationalProgram(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EducationalProgram::class, 'faculty_id', 'id');
    }
}
