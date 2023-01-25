<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'device_id',
        'glass_id',
        'weight',
        'height',
        'width',

    ];

    public function device(){
        return $this->belongsTo(Device::class);
    }
    public function glass(){
        return $this->belongsTo(Glass::class);
    }
}
