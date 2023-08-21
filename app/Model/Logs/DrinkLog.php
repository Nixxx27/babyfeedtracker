<?php

namespace App\Model\Logs;

use Illuminate\Database\Eloquent\Model;

class DrinkLog extends Model
{
    protected $table = 'drink_log';
    protected $guarded = [];

    protected $dates = ['date_time'];
}
