<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relationships
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
