<?php
namespace App\Http\Service;

use App\Models\Orgnaization;
use Illuminate\Support\Facades\Auth;
class OrgnaizationService
{

    public function getAllOrgnaization()
    {
        $currentUser = Auth::guard('api')->user();
        if ($currentUser->isAdmin()) {
            $getAllOrgnaization = Orgnaization::paginate(10);
            return $getAllOrgnaization;
        }
        return 'Not Authorized.';
    }

    public function storeOrgnaization($request)
    {
        if (Auth::guard('api')->user()->can('create')) {
            $orgnaizationStored = Orgnaization::create($request);
            return $orgnaizationStored;
        }
        return 'Not Authorized.';
    }

    public function showOrgnaization($id)
    {
        if (Auth::guard('api')->user()->can('create')) {
            $findOrgnaizationToShow = Orgnaization::findOrFail($id);
            return $findOrgnaizationToShow;
        }
        return 'Not Authorized.';
    }

    public function updateOrgnaization($request, $id)
    {
        if (Auth::guard('api')->user()->can('update')) {
            $findOrgnaizationToUpdate = Orgnaization::findOrFail($id);
            $updateOrgnaizationData = $findOrgnaizationToUpdate->update($request);
            return $updateOrgnaizationData;
        }
        return 'Not Authorized.';

    }

    public function deleteOrgnaization($id)
    {
        if (Auth::guard('api')->user()->can('delete')) {
            $findOrgnaizationToDelete = Orgnaization::findOrFail($id);
            $orgnazationDeleted = $findOrgnaizationToDelete->delete();
            return $orgnazationDeleted;
        }
        return 'Not Authorized.';
    }
}
