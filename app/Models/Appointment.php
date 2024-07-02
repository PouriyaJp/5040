<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['consultant_id', 'client_id', 'appointment_time'];

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
