<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    protected $table = 'sites';

    protected $fillable = [
        'visible',
        'name',
        'comment'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function __toString()
    {
        return $this->name;
    }
}