<?php

namespace App\Http\Controllers;

use App\Http\Service\PostService;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $postService;

    public function __construct()
    {
        $this->postService = new PostService();
    }

    public function index()
    {
        return response()->json($this->postService->getAllPost());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $postDataUpdate = $request->all();
        $post = Post::find($id);
        if (Auth::guard('api')->user()->can('update', $post)) {
            return response()->json($this->postService->updatePost($postDataUpdate,$id));
        } else {
            echo 'Not Authorized.';
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (Auth::guard('api')->user()->can('delete', $post)) {
            return response()->json($this->postService->deletePost($id));
        } else {
            echo 'Not Authorized.';
        }
    }
}
