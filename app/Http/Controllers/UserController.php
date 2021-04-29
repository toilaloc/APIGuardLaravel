<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Service\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ResponseAPITrait;
class UserController extends Controller
{
    use ResponseAPITrait;
    private $userService;
    private $resourcePath = "App\Http\Resources\User";
    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userData = $this->userService->getAllUser();
        $info = [
            'status' => true,
            'message' => 'All users fetched successfully',
        ];
        return $this->responseAPI($userData, $this->resourcePath, $info);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $storeUserData = $request->validated();
        $storedData = $this->userService->storeUser($storeUserData);
        return response()->json($storedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userDataShowing = $this->userService->showUser($id);
        return response()->json($userDataShowing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
        $userData = $request->validated();
        $userDataUpdated = $this->userService->updateUser($userData, $id);
       return response()->json($userDataUpdated);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDeleted = $this->userService->deleteUser($id);
        return response()->json($userDeleted);
    }
}
