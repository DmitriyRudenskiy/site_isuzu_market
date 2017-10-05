<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    protected $table = 'forms';

    protected $fillable = [
        'site_id',
        'visible',
        'form_title',
        'name_label',
        'phone_label',
        'name_placeholder',
        'phone_placeholder',
        'button_title',
        'project_id',
        'form_description',
        'message_label',
        'message_placeholder',
        'in_modal'
    ];
}
