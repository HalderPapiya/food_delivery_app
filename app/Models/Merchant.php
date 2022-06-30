<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchants';
    protected $fillable = [
        'name',
        'shop_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'pin',
        'landmark',
        'status',
    ];

    // public function agent()
    // {
    //     return $this->belongsTo('App\Models\Agent', 'agent_id', 'id');
    // }
}