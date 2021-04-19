<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    CONST PROFILE_PICTURE_STORAGE_PATH = 'images/users/';

    public function upload(Request $request)
    {
        if ( $request->hasFile('image') ){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs($this::PROFILE_PICTURE_STORAGE_PATH, $filename, 'public');
            Auth()->user()->update(['picture'=> '/storage/' . $this::PROFILE_PICTURE_STORAGE_PATH . $filename]);
        }
        return redirect()->back();
    }

    public function userPanelData(){
        $users = User::paginate(15);
        return view("admin/users", ['users'=>$users]);
    }
}
