<?php

namespace App\Modules\Models\Candidate;

use App\Modules\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Candidate extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'phone',
        'nationality',
        'education',
        'gender',
        'dob',
        'mode_of_contact',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
