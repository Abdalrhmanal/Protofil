<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'data_start', 'data_end', 'enterprise','description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
