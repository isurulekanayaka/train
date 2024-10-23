<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'payment_details';

    // Define the fillable attributes
    protected $fillable = [
        'noOfUsers',
        'ticketClass',
        'date',
        'classPrice',
        'totalPrice',
        'train_station_id',
        'user_id',
    ];

    // Define relationships
    public function trainStation()
    {
        return $this->belongsTo(TrainStation::class, 'train_station_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
