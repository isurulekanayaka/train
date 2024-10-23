<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainLog extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'train_logs';

    // Specify the fields that can be mass-assigned
    protected $fillable = ['train_id', 'reason', 'date', 'time', 'status'];

    // Define the relationship to the Train model
    public function train()
    {
        return $this->belongsTo(Train::class);
    }

    public function scopeOfDay($query, $date)
    {
        return $query->whereDate('date', $date);
    }
}
