<?php

namespace App\Models\Residents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResidentRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function resident_certificates()
    {
        return $this->hasMany('App\Models\Residents\ResidentCertificate');
    }
}
