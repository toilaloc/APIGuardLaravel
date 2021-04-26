<?php

namespace App\Http\Service;

use App\Models\Post;

class PostService
{

    public function getAllPost()
    {
        return Post::all();
    }

    public function updatePost($request, $id)
    {
        $postUpdated = Post::find($id)->update($request);
        return $postUpdated;
    }

    public function deletePost($id)
    {
        $postDeleted = Post::findOrFail($id)->delete($id);
        return $postDeleted;
    }
}
