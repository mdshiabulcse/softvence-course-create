<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'category',
        'description',
        'feature_video',
        'feature_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class, 'course_id');
    }
}
