<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
        'name',
        'specie',
        'race',
        'gender',
        'fur',
        'photo'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinicalRecords()
    {
        return $this->hasMany(ClinicalRecord::class);
    }

    public function anesthesiaSurgeries()
    {
        return $this->hasMany(AnesthesiaSurgeries::class);
    }

    public function sedationAnesthesia()
    {
        return $this->hasMany(SedationAnesthesia::class);
    }

    public function internments()
    {
        return $this->hasMany(Internment::class);
    }
}
