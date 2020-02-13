<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'uid', 'user_id', 'action', 'status', 'for-admin'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
