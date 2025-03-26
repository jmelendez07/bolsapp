<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs_of_recruiter';
    protected $fillable = [
        'title',
        'description',
        'company',
        'location',
        'type',
        'salary',
        'recruiter_id',
    ];

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }

    public function requests() 
    {
        return $this->hasMany(Request::class);
    }
}
