<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'country_id'];
    public function userAddresses()
    {
        return $this->hasMany(UserAddress::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class, "country_id");
    }
}