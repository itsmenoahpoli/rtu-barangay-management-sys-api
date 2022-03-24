<?php

namespace App\Models\Residents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResidentCertificates extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function resident_record()
    {
        return $this->belongsTo('App\Models\Residents\ResidentRecord');
    }
}
