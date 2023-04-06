<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'status',
        'ordered_by_id',
        'pharmacy_id',
        'is_insured',
    ];

    public function orderable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'ordered_by_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'ordered_by_id');
    }
    public function medicines()
    {
        return $this->belongsToMany(
            Medicine::class,
            'order_medicine',
            'order_id',
            'medicine_id'
        )->withPivot('quantity');
    }
    protected function createdAt(): Attribute
    {
        return Attribute::make(

            get: fn (string $value) => Carbon::parse($value)->format('d/m/Y h:m A'),

        );
    }
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                switch ($value) {
                    case 1:
                        return "new";
                    case 2:
                        return "processing";
                    case 3:
                        return "waiting";
                    case 4:
                        return "cancelled";
                    case 5:
                        return "confirmed";
                    case 6:
                        return "delivered";
                }
            },
        );
    }
    public static function totalPrice($qty, $med)
    {

        $total = 0;

        for ($x = 0; $x < count($med); $x++) {

            $price = Medicine::all()->where('name', $med[$x])->first()->price;
            $total = $total + ($price * $qty[$x]);
        }

        return $total;
    }
    public static function createOrderMedicine($order, $med, $qty)
    {

        for ($x = 0; $x < count($med); $x++) {

            $id = Medicine::all()->where('name', $med[$x])->first()->id;

            $order->medicines($id)->attach(1, ['quantity' => $qty[$x]]);
        }
    }
}
