<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Modules\Models\Candidate\Candidate;
use App\Modules\Service\Candidate\CandidateService;
use App\Http\Requests\Candidate\CandidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;

class CandidateController extends Controller
{
    protected $candidate;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(CandidateService $candidate)
    {
        $this->candidate = $candidate;
    }
    public function index()
    {
        return view('candidate.index');
    }

    public function getAllData()
    {
        return $this->candidate->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {
        if($candidate = $this->candidate->create($request->all())){
            Toastr()->success('Candidate Created Successfully.','Success');
            return redirect()->route('candidate.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = $this->candidate->find($id);
        return back();
    }
}
