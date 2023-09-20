<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticePlan extends Model
{
    use HasFactory;


    public function practiceStudent()
    {
        return $this->belongsTo(PracticeStudent::class);
    }
}
