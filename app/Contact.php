<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'surname', 'email', 'contact_number', 'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
}
