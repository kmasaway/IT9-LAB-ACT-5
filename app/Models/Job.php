<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $primaryKey = 'job_id';
    public $timestamps = false;

    protected $fillable = [
        'job_title',
        'min_salary',
        'max_salary',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_id', 'job_id');
    }
}
