<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\BelongsTo;


class Supplier extends Model
{
    use HasFactory;
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
