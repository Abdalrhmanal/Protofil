<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = ['stor_teach', 'id_education', 'id_professional_experience', 'id_user'];

    public function education()
    {
        return $this->belongsTo(Education::class, 'id_education');
    }

    public function professionalExperience()
    {
        return $this->belongsTo(PExperience::class, 'id_professional_experience');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
