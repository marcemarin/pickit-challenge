<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'owner_id', 'car_id'];

    public function getTotalAttribute()
    {
        return $this->services->sum('amount');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
