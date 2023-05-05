<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

       /** 
     * Display the specified Information from Token Bearer
     */
    public function show(Request $request)
    {
        // Retrieve a model by its primary key...
        return $request->user();

    }

            /**
     * Update the image of the specific from Token Bearer.
     */
    public function image(UserRequest $request)
    {
        //
        $user = User::findorFail($request->user()->id);

        if(!is_null($user->image)){
            Storage::disk('public')->delete($user->image);
        }

        $user->image = $request->file('image')->storePublicly('images', 'public');

        $user->save();

        return $user;
    }
}
