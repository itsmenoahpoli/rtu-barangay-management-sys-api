<?php

namespace App\Models\Residents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resident_certificates()
    {
        return $this->hasMany('App\Models\Residents\ResidentCertificate');
    }
}
