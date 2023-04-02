<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Pharmacy;
use Cog\Contracts\Ban\Bannable as BannableInterface;
use Cog\Laravel\Ban\Traits\Bannable;

class Doctor extends Model implements BannableInterface
{
    use HasFactory, HasRoles, Bannable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'avatar',
        'is_banned',
        'pharmacy_id'
    ];

    // public function setCreatedAtAttribute($value)
    // {
    //     $this->attributes['created_at'] = date('d-m-Y', strtotime($value));
    // }

    public function pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class);
    }
    public function orders()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
    public function type()
    {
        return $this->morphOne(User::class, 'typeable');
    }
}
