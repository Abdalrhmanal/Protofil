<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'data_start', 'data_end', 'enterprise','course_description'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
