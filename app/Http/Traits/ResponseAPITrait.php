<?php
namespace App\Http\Traits;

use App\Http\Resources\User;

trait ResponseAPITrait
{
    public function responseAPI($data, $path, $info)
    {
        if (gettype($data) == 'object') {
            return $path::collection($data)->additional($info);
        } else {
            return response()->json($data);
        }
    }
}
