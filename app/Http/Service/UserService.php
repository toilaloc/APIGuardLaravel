<?php
namespace App\Http\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    CONST ADMIN_ROLE_ID = 1;
    CONST ADMIN_ORG_ROLE_ID = 2;
    CONST WRITER_ROLE_ID = 3;

    public function getAllUser()
    {
        $currentUser = Auth::guard('api')->user();
        $getAllUser = User::paginate(10);
        $getUserSameOrg = User::where('orgnaization_id', $currentUser->orgnaization_id)->paginate(10);
        if ($currentUser->isAdmin() || $currentUser->isAdminOrg()) {
            if ($currentUser->isAdmin()) {
                return $getAllUser;
            }
            return $getUserSameOrg;
        }
        return "Not authorize";

    }

    public function showUser($id)
    {
        $currentUser = Auth::guard('api')->user();
        if ($currentUser->isAdmin() || $currentUser->isAdminOrg() || $currentUser->id == $id) {
            $findUserToShow = User::findOrFail($id);
            return $findUserToShow;
        }
        return "Not authorize";
    }

    public function deleteUser($id)
    {
        $findUserToDelete = User::findOrFail($id);
        if (Auth::guard('api')->user()->can('delete', $findUserToDelete)) {
            $userDeleted = $findUserToDelete->delete();
            $refreshUserData = $findUserToDelete->refresh();
            $refreshUserData->roles()->detach();
            return $userDeleted;
        }
        return 'Not Authorized.';
    }

    public function updateUser($request, $id)
    {
        $findUserToUpdate = User::findOrFail($id);
        if (Auth::guard('api')->user()->can('update', $findUserToUpdate)) {
            $request['password'] = Hash::make($request['password']);
            $userUpdated = $findUserToUpdate->update($request);
            $refreshData = $findUserToUpdate->refresh();
            // If user is admin then can update roles.
            if (Auth::guard('api')->user()->isAdmin()){
                $refreshData->roles()->sync([
                    self::ADMIN_ROLE_ID,
                    self::ADMIN_ORG_ROLE_ID,
                    self::WRITER_ROLE_ID
                ]);
            }
            return $refreshData;
        }
        return 'Not Authorized.';
    }

    public function storeUser($request)
    {
        $currentUser = Auth::guard('api')->user();
        if ($currentUser->isAdmin()) {
            $request['password'] = Hash::make($request['password']);
            $dataUserStored = User::create($request)->roles()->attach([self::WRITER_ROLE_ID]);
            return $dataUserStored;
        }
        return 'Not Authorized.';

    }
}
