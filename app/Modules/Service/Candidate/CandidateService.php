<?php

namespace App\Modules\Service\Candidate;

use App\Jobs\ApprovedCandidateQueueJob;
use App\Mail\RejectedCandidateEmail;
use App\Modules\Models\Candidate\Candidate;

use App\Modules\Models\User;
use App\Modules\Service\Service;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\ApprovedCandidateNotification;
use App\Notifications\RejectedCandidateNotification;
use Illuminate\Support\Facades\Mail;
use Notification;
class CandidateService extends Service
{
    protected $candidate;
    protected $user;
    protected $qualification;
    protected $selected;

    public function __construct(Candidate $candidate, User $user)
    {
        $this->candidate = $candidate;
        $this->user = $user;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->candidate->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('name', function (Candidate $candidate) {
                return $candidate->firstname.' '.$candidate->lastname;
            })
            ->editColumn('gender',function(Candidate $candidate) {
                if(isset($candidate->gender) && $candidate->gender == 0) {
                    return "Female";
                } else {
                    return "Male";
                }
            })
            ->rawColumns(['actions', 'status_change'])->make(true);
    }


    public function create(array $data)
    {
        try {
            /* $data['keywords'] = '"'.$data['keywords'].'"';*/
            $candidate = DB::transaction(function () use ($data) {
                        $candidate = [
                            'firstname' => $data['firstname'],
                            'lastname' => $data['lastname'],
                            'email' => $data['email'],
                            'phone' => $data['phone'],
                            'address' => $data['address'],
                            'nationality' => $data['nationality'],
                            'dob' => $data['dob'],
                            'education' => $data['education'],
                            'gender' => $data['gender'],
                            'mode_of_contact' => $data['mode_of_contact'],
                        ];
                    Candidate::create($candidate);
                    return $candidate;
            });
            return $candidate;
        } catch (Exception $e) {
            return null;
        }
    }


    // /**
    //  * Paginate all User
    //  *
    //  * @param array $filter
    //  * @return Collection
    //  */
    // public function paginate(array $filter = [])
    // {
    //     $filter['limit'] = 25;

    //     return $this->user->orderBy('id','DESC')->whereIsDeleted('no')->paginate($filter['limit']);
    // }

    // /**
    //  * Get all User
    //  *
    //  * @return Collection
    //  */
    // public function all()
    // {
    //     return $this->user->whereIsDeleted('no')->all();
    // }

    // /**
    //  * Get all users with supervisor type
    //  *
    //  * @return Collection
    //  */


    public function find($candidateId)
    {
        try {
            return $this->candidate->find($candidateId);
        } catch (Exception $e) {
            return null;
        }
    }











    // /**
    //  * Delete a User
    //  *
    //  * @param Id
    //  * @return bool
    //  */
    // public function delete($userId)
    // {
    //     try {
    //         $data['last_deleted_by']= Auth::user()->id;
    //         $data['deleted_at']= Carbon::now();
    //         $user = $this->user->find($userId);
    //         $data['is_deleted']='yes';
    //         return $user = $user->update($data);
    //         dd($user);

    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }

    // public function getUserRoles($id){
    //     try{
    //         $user = User::with('roles')->find($id);
    //         $roles = $user->roles;
    //         return $roles;
    //     }catch (Exception $e){
    //         return false;
    //     }
    // }


    // /**
    //  * write brief description
    //  * @param $name
    //  * @return mixed
    //  */
    // public function getByName($name){
    //     return $this->user->whereIsDeleted('no')->whereName($name);
    // }

    public function getBySlug($id)
    {
        return $this->candidate->whereId($id)->first();
    }

    public function getById($id)
    {
        return $this->selectedCandidate->whereId($id)->first();
    }

    public function paginate(array $filter = [])
    {
        $filter['limit'] = 25;

        return $this->candidate->orderBy('id','DESC')->paginate($filter['limit']);
    }


    // function uploadFile($file)
    // {
    //     if (!empty($file)) {
    //         $this->uploadPath = 'uploads/user';
    //         return $fileName = $this->uploadFromAjax($file);
    //     }
    // }

    // public function __deleteImages($subCat)
    // {
    //     try {
    //         if (is_file($subCat->image_path))
    //             unlink($subCat->image_path);

    //         if (is_file($subCat->thumbnail_path))
    //             unlink($subCat->thumbnail_path);
    //     } catch (\Exception $e) {

    //     }
    // }

    // public function updateImage($userId, array $data)
    // {
    //     try {
    //         $user = $this->user->find($userId);
    //         $user = $user->update($data);

    //         return $user;
    //     } catch (Exception $e) {
    //         //$this->logger->error($e->getMessage());
    //         return false;
    //     }
    // }
}
