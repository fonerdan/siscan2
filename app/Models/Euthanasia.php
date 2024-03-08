<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Euthanasia extends Model
{
    use HasFactory;
    protected $fillable = [
        'animal_id',
        'client_id',
        'doctor',
        'description',
    ];
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
