<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['uid', 'first_name', 'last_name'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
