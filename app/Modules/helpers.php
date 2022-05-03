<?php

use App\Modules\Models\Country\Country;
use App\Modules\Models\District\District;
use App\Modules\Models\Province\Province;
use App\Modules\Models\User;
use Illuminate\Support\Facades\Storage;

function getTableHtml($object, $type, $editRoute = null, $deleteRoute = null, $printRoute = null, $viewRoute = null,$approveList = null,$rejectList = null)
{
    switch ($type) {
        case 'actions':
            return view('general.table-actions', compact('editRoute','deleteRoute','viewRoute','printRoute','approveList','rejectList'));
            break;

        case 'availability':
            return '<span class="badge-boxed' . getLabel($object->availability) . '">' . $object->availability_text . '</span>';
            break;
        case 'visibility':
            return '<span class="badge-boxed' . getLabel($object->visibility) . '">' . $object->visibility_text . '</span>';
            break;
        case 'status':
            return '<span class="badge-boxed' . getLabel($object->status) . '">' . $object->status_text . '</span>';
            break;
        case 'is_main':
            return '<span class="badge-boxed' . getLabel($object->is_main) . '">' . $object->main_text . '</span>';
            break;
        case 'is_default':
            return '<span class="badge-boxed' . getLabel($object->is_default) . '">' . $object->main_text . '</span>';
            break;
        case 'image':
            return view('general.lightbox', compact('object'));
            break;
    }
}


function getLabel($status)
{
    $badge = '';
    switch ($status) {
        case 'yes':
            $badge = 'badge-primary';
            break;

        case 'no':
            $badge = 'badge-danger';
            break;
        case 'available':
            $badge = 'badge-success';
            break;

        case 'not_available':
            $badge = 'badge-danger';
            break;
        case 'visible':
            $badge = 'badge-success';
            break;
        case 'in-visible':
            $badge = 'badge-success';
            break;

        case 'active':
            $badge = 'badge-primary';
            break;
        case 'inactive':
            $badge = 'badge-danger';
            break;
    }

    return $badge;
}

/**
 * ---------------------------------------------
 * |            Country                         |
 * ----------------------------------------------
 */
function getCountries()
{
    return Country::getCountries();
}

/**
 * ---------------------------------------------
 * |            Province                         |
 * ----------------------------------------------
 */
function getProvinces()
{
    return Province::getProvinces();
}

function getProvincesByCountryId($country_id)
{
    return Province::getProvincesByCountryId($country_id);
}

/**
 * ---------------------------------------------
 * |            District                        |
 * ----------------------------------------------
 */
function getDistricts()
{
    return District::getDistricts();
}

function getDistrictsByProvinceId($province_id)
{
    return District::getDistrictsByProvinceId($province_id);
}

function uploadCommonFile($file, $path,$existingPath=null)
{
    // dd($file->getClientOriginalExtension());
    if ($file) {
        if($existingPath){
            if (Storage::exists($existingPath)) {
                Storage::delete($existingPath);
            }
        }
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = $path . time() . '.' . $file->getClientOriginalExtension();
        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('candidates', $filename,'public');
        return $path;
    }
}

function getPrimaryNotifiableUsers()
{
    $users = User::role('SuperAdmin')->get();
    return $users;
}
