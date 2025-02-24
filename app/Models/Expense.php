<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['expense_type', 'amount', 'date', 'description'];

    public function accountant()
    {
        return $this->belongsTo(Accountant::class);
    }
}

