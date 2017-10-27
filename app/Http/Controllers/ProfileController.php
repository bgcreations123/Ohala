<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //Profile Functions here
    public function index(){
    	//
    	$user = Auth::user();

    	return view('profile.index', compact('user'));
    }

    public function change_image(){
    	//
    	$user = Auth::user();

    	return view('profile.change_image', compact('user'));
    }

    public function update_image(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
            //Remove current image if any
            $user = Auth::user();

            if ($user->avatar != 'default.png')
            {
                $old_image = public_path('/uploads/avatars/' . $user->avatar);

                if(file_exists($old_image)){
                    @unlink($old_image);
                }
            }

    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename ) ); 

    		$user->avatar = $filename;
    		$user->save();

    		return view('profile.index', compact('user'));
    	}
    }
}
