<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'producer_id',
        'phonemodel_id',
    ];


    public function producer() {
        return $this->belongsTo(Producer::class);
    }

    public function phonemodel() {
        return $this->belongsTo(PhoneModel::class);
    }
}
