<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedationAnesthesia extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'animal_id',
        'detail'
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
