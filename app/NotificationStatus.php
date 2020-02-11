<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationStatus extends Model
{
    protected $fillable = [
        'uid','notif_id', 'user_id', 'status'
    ];
}
