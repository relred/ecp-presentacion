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
        
        if ($percentage <= 20) return 'red-500';
        if ($percentage <= 40) return 'orange-500';
        if ($percentage <= 60) return 'yellow-600';
        if ($percentage <= 80) return 'purple-400';
        return 'purple-800';
    }
} 