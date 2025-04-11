<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['configuration_id', 'price', 'start_date', 'end_date'];

    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }
}
