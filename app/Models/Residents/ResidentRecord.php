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
     * Scopes
     */
    public function scopeSearch($query, $q)
    {
        return $query->where('first_name', 'LIKE', "%$q%")
        ->orWhere('middle_name', 'LIKE', "%$q%")
        ->orWhere('last_name', 'LIKE', "%$q%")
        ->orWhere('email', 'LIKE', "%$q%")
        ->orWhere('landline', 'LIKE', "%$q%")
        ->orWhere('mobile_number', 'LIKE', "%$q%")
        ->where('ref_code', 'LIKE', "%$q%");
    }

    /**
     * Relationships
     */

    public function resident_certificates()
    {
        return $this->hasMany('App\Models\Residents\ResidentCertificate')->orderBy('created_at', 'desc');
    }

    public function resident_complaints()
    {
        return $this->hasMany('App\Models\Complaints\ComplaintRecord')->orderBy('created_at', 'desc');
    }
}
