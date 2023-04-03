<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'email', 'password','gender','mobile','avatar','national_id','birth_day','password','typeable_id',
        'typeable_type',
    ];
    public function type()
    {
        return $this->morphOne(User::class, 'typeable');
    }
    public function orders()
    {
        return $this->hasMany(Order::class ,'orderd_by_id');
    }
    public function addresses()
    {
        return $this->hasMany(UserAddress::class, "user_id");
    }
}
