<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainNumber',
        'trainName',
        'destinationPoint',
        'fare1stClass',
        'fare2ndClass',
        'fare3rdClass',
    ];

    public function trainStations()
    {
        return $this->hasMany(TrainStation::class);
    }
}
