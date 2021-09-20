<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    protected $fillable = [
        'rooms',
        'name',
        'address_complete',
        'address_city',
        'address_state',
    ];

    public function reserves()
    {
        return $this->hasMany(Reserve::class);

    }
}
