<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
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
        
        if ($percentage <= 20) return 'bg-red-600';
        if ($percentage <= 40) return 'bg-orange-400';
        if ($percentage <= 60) return 'bg-yellow-400';
        if ($percentage <= 80) return 'bg-purple-500';
        return 'bg-purple-950';
    }
}
