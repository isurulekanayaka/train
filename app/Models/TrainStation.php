<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainStation extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'train_stations'; // Make sure to include quotes

    protected $fillable = [
        'train_id',
        'time',
        'start_station',
        'end_station',
    ];

    public function train()
    {
        return $this->belongsTo(Train::class);
    }
}
