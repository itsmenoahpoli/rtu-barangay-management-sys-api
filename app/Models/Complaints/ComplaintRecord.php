<?php

namespace App\Models\Complaints;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplaintRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function resident_record()
    {
        return $this->belongsTo('App\Models\Residents\ResidentRecord');
    }
}
