<?php
namespace App\Http\Service;
use App\Models\User;

class UserService
{
    public function getAllUser()
    {
        $getUsers = User::all();
        return $getUsers;
    }

    public function showUser($id)
    {
        $findUserToShow = User::findOrFail($id);
        return $findUserToShow;
    }

    public function deleteUser($id)
    {
        $findUserToDelete = User::findOrFail($id);
        if (Auth::guard('api')->user()->can('delete', $findUserToDelete)) {
            $userDeleted = $findUserToDelete->delete();
            return $userDeleted;
        }
        return 'Not Authorized.';
    }
    public function updateUser($request, $id)
    {
        $findUserToUpdate = User::findOrFail($id);
        if (Auth::guard('api')->user()->can('update', $findUserToUpdate)) {
            $userUpdated = $findUserToUpdate->update($request);
            return $userUpdated;
        }
        return 'Not Authorized.';
    }
}
