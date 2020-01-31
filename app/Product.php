<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
