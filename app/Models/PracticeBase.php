<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeBase extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_kz',
        'name_ru',
        'name_en',
    ];

    public function baseUser()
    {
        return $this->hasMany(PracticeBaseUser::class);
    }
}
