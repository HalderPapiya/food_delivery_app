<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class AgentSalary extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'agent_salaries';
    protected $fillable = [
        'agent_id',
        'salary',
        'bonus',
        'total_salary',
        'status',
    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent', 'agent_id', 'id');
    }
}