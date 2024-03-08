<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'client_id',
        'sterilized',
        'temp',
        'weight',
        'age',
        'color',
        'observation',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
