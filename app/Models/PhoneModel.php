<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_name',
    ];

    public function devices(){
        return $this->belongsToMany(Device::class);
    }
}
