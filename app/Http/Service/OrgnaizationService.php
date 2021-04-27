<?php
namespace App\Http\Service;

use App\Models\Orgnaization;
use Illuminate\Support\Facades\Auth;
class OrgnaizationService
{

    public function getAllOrgnaization()
    {
        $getAllOrgnaization = Orgnaization::all();
        return $getAllOrgnaization;
    }

    public function storeOrgnaization($request)
    {
        $orgnaizationStored = Orgnaization::create($request);
        return $orgnaizationStored;
    }

    public function showOrgnaization($id)
    {
        $findOrgnaizationToShow = Orgnaization::findOrFail($id);
        return $findOrgnaizationToShow;
    }

    public function updateOrgnaization($request, $id)
    {
        $findOrgnaizationToUpdate = Orgnaization::findOrFail($id);
        $updateOrgnaizationData = $findOrgnaizationToUpdate->update($request);
        return $updateOrgnaizationData;

    }

    public function deleteOrgnaization($id)
    {
        $findOrgnaizationToDelete = Orgnaization::findOrFail($id);
        $orgnazationDeleted = $findOrgnaizationToDelete->delete();
        return $orgnazationDeleted;
    }
}
