<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'model_name',
    ];

    public function devices(){
        return $this->belongsToMany(Device::class);
    }
}
