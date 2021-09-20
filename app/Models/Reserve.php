<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserves';

    protected $fillable = [
        'description',
        'reserve_date',
        'apartment_id',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

}
