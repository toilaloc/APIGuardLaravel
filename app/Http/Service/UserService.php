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
}
