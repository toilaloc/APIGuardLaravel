<?php

namespace App\Http\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{

    public function getAllPost()
    {
        return Post::all();
    }

    public function storePost($request)
    {
        $postCreated = Post::create($request);
        return $postCreated;
    }

    public function showPost($id)
    {
        $findPostToShow = Post::findOrFail($id);
        return $findPostToShow;
    }

    public function updatePost($request, $id)
    {
        $findPostToUpdate = Post::findOrFail($id);
        if (Auth::guard('api')->user()->can('update', $findPostToUpdate)) {
        $postUpdated = $findPostToUpdate->update($request);
            return $postUpdated;
        }
        return 'Not Authorized.';
    }

    public function deletePost($id)
    {
        $findPostToDelete = Post::findOrFail($id);
        if (Auth::guard('api')->user()->can('delete', $findPostToDelete)) {
            $postDeleted = $findPostToDelete->delete($id);
            return $postDeleted;
        }
        return 'Not Authorized.';

    }
}
