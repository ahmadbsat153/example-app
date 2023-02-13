<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date',
        'due_date'=>'date',
        'payment_date'=>'date',
        'payment_status' => 'array',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
