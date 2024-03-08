<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnesthesiaSurgeries extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'animal_id',
        'type_client',
        'other_type_client'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
