<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'specialization', 'email', 'phone_number'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function treatmentRecords()
    {
        return $this->hasMany(TreatmentRecord::class);
    }
}

