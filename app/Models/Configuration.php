<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['car_id', 'name'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'configuration_options');
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function currentPrice()
    {
        return $this->hasOne(Price::class)->whereDate('start_date', '<=', now())->whereDate('end_date', '>=', now());
    }
}
