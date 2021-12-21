<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Car extends Model
{
    use HasFactory, HasRelationships;

    protected $fillable = ['brand', 'model', 'year', 'plate_number', 'color', 'owner_id'];

    protected $casts = [
        'year' => 'date'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }    
}
