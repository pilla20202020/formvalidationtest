<?php

namespace App\Http\Requests\Candidate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|distinct|',
            'lastname' => 'required|',
            'phone'=> 'regex:/^([0-9\s\-\+\(\)]*)$/|min:7|max:15',
            'email' => 'required|unique:candidates,email',
            'address' => 'required',
            'nationality' => 'required',
            'dob' => 'required',
            'education' => 'required',
        ];
    }
}
