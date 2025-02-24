<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'dob', 'email', 'phone_number', 'address'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function treatmentRecords()
    {
        return $this->hasMany(TreatmentRecord::class);
    }
}

