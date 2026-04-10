<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\LeadStatus;

class Lead extends Model
{
    protected $table = 'leads';
	
	const UPDATED_AT = null;
	
    protected $fillable = [
        'name',
        'email',
        'phone',
        'budget',
        'status',
        'notes',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
		'status' => LeadStatus::class,
        'created_at' => 'datetime'
    ];
}
