<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
        'goal',
        'mobilized'
    ];

    protected $appends = ['percentage'];

    public function getPercentageAttribute()
    {
        if ($this->goal == 0) return 0;
        return round(($this->mobilized / $this->goal) * 100, 1);
    }

    public function getProgressColorAttribute()
    {
        $percentage = $this->percentage;
        
        if ($percentage <= 20) return 'red';
        if ($percentage <= 40) return 'orange';
        if ($percentage <= 60) return 'yellow';
        if ($percentage <= 80) return 'light-purple';
        return 'dark-purple';
    }
} 