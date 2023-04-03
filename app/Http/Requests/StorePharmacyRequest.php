<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Doctor;

class Pharmacy extends Model
{
    use HasFactory, HasRoles ,SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'avatar',
        'is_deleted'
        
    ];

    protected $dates=['deleted_at'];
    
    protected static function boot()
    {
        parent::boot();
        static::bootSoftDeletes();
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getTotalOrdersAttribute()
    {
        return $this->orders()->count();
    }

    public function getTotalRevenueAttribute()
    {
        return $this->orders()->sum('total_price');
    }
   
    public function type()
    {
        return $this->morphOne(User::class, 'typeable');
    }
}
