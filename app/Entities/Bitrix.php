<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Bitrix extends Model
{
    protected $table = 'bitrix';

    protected $fillable = ['access_token', 'refresh_token'];

    /**
     * @return string|null
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @return string|null
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }
}