<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'ci',
        'expedition',
        'home',
        'street',
        'number',
        'phone',
        'reference_phone',
        'photo'
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function paymentCommitments()
    {
        return $this->hasMany(PaymentCommitment::class);
    }

    public function anesthesiaSurgeries()
    {
        return $this->hasMany(AnesthesiaSurgeries::class);
    }
    public function euthanasias()
    {
        return $this->hasMany(Euthanasia::class);
    }

    public function clinicalRecords()
    {
        return $this->hasMany(ClinicalRecord::class);
    }

    public function serviceProvisionContracts()
    {
        return $this->hasMany(ServiceProvisionContract::class);
    }

    public function sedationAnesthesias()
    {
        return $this->hasMany(SedationAnesthesia::class);
    }

    public function internments()
    {
        return $this->hasMany(Internment::class);
    }
}
