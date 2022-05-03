<?php

namespace App\Modules\Models\Candidate;

use App\Modules\Models\User;
use App\Modules\Models\Candidate\Candidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedCandidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'selected_country_id',
        'company_name',
        'visa_number',
        'work_type',
        'occupation',
        'contract_duration',
        'basic_salary',
        'work_duration',
        'visa_issue_date',
        'visa_expiry_date',
    ];

    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }

    public function getAllSelectedCandidate()
    {
        return self::select('candidates.first_name','candidates.last_name','selected_candidates.*')
        ->join('candidates','selected_candidates.candidate_id','candidates.id')
        ->get();
    }
}
    