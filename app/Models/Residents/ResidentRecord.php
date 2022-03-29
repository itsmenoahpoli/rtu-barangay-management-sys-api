<?php

namespace App\Models\Residents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResidentRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Relationships
     */

    public function resident_files()
    {
        return $this->hasMany('App\Models\Residents\ResidentRequestFile');
    }
}
