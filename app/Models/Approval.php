<?php

namespace App\Models;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($approval) {
            $approval->approved_by = auth()->user()->name;
        });
    }
}
