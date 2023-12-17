<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infouser extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'work',
        'storbi',
        'img_background',
        'basic_work',
        'about',
        'phone_email_one',
        'degree',
        'age',
        'city',
        'phone',
        'birthday',
        'freelance',
        'motivation_letter',
        'facebook',
        'linkedin',
        'instagram',
        'github',
        'tytar_x',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
