<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    protected $table = 'phones';

    protected $fillable = [
        'site_id',
        'ip',
        'city',
        'name',
        'phone',
        'message',
        'contact_id',
        'lead_id'
    ];

    public function site()
    {
        return $this->hasOne(Sites::class, 'id', 'site_id');
    }
}