<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pharmacy extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'national_id',
        'avatar',
        
    ];

   /* public function pharmacies()
    {
        return $this->hasMany(Doctor::class);
    }
    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
    public function type()
    {
        return $this->morphOne(User::class, 'typeable');
    }*/
}
