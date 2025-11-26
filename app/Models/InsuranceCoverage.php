<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceCoverage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'policy_number',
        'insurer_name',
        'policy_state_date',
        'policy_end_date',
        'vehicle_classes',
        'insurer_logo',
        'coverage_matrix',
        'what_not_covered',
        'key_exclusions',
        'excess_amount',
        'max_claim_limit',
        'documents',
        'customer_instruction',
        'claims_contact',
        'required_documents',
        'status',
        'company_id',
        'policy_type',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}