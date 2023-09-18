<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public function practiceStudents()
    {
        return $this->hasMany(PracticeStudent::class);
    }
}
