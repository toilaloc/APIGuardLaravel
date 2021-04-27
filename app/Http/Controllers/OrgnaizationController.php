<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrgnaizationRequest;
use App\Http\Service\OrgnaizationService;
use App\Models\Orgnaization;
use Illuminate\Http\Request;

class OrgnaizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $orgnaizationService;

    public function __construct()
    {
        $this->orgnaizationService = new OrgnaizationService();
    }

    public function index()
    {
        return response()->json($this->orgnaizationService->getAllOrgnaization());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrgnaizationRequest $request)
    {
        $storeOrgnaizationData = $request->validated();
        return response()->json($this->orgnaizationService->storeOrgnaization($storeOrgnaizationData));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orgnaizationDataShow = $this->orgnaizationService->showOrgnaization($id);
        return response()->json($orgnaizationDataShow);
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
    public function update(StoreOrgnaizationRequest $request, $id)
    {
        $orgnaizationData = $request->validated();
        $updatedOrgnaizationData = $this->orgnaizationService->updateOrgnaization($orgnaizationData, $id);
        return response()->json($updatedOrgnaizationData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedOrgnaization = $this->orgnaizationService->deleteOrgnaization($id);
        return response()->json($deletedOrgnaization);
    }
}
