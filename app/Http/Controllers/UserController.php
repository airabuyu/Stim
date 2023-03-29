<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);

        // foreach($user->friendsIncoming as $u){
        //     echo $u->pivot->user_add;
        //     echo $u->fullname;
        //     echo $u->pivot->user_add;
        // }

        // dd("asd");
        return view('friends', compact('user'));
    }
    public function acceptIncoming(User $user){
        $user_add = User::find(Auth::user()->id);

        $user_add->friendsIncoming()->updateExistingPivot($user->id, array( 'status' => "Accepted"));

        return redirect('/friends');

    }

    public function deletePending(User $user){
        // dd($user->fullname);

        $user_add = User::find(Auth::user()->id);

        $user_add->friendsPending()->detach($user->id);

        return redirect('/friends');
    }

    public function deleteIncoming(User $user){
        // dd($user->fullname);

        $user_add = User::find(Auth::user()->id);

        $user_add->friendsIncoming()->detach($user->id);

        return redirect('/friends');
    }

    public function addFriend(Request $request){
        // dd($request->all());

        $user = User::where('username', $request->add_user)
        ->where('username', '!=', Auth::user()->username)
        ->first();

        $user_add = User::find(Auth::user()->id);

        $user_add->friendsPending()->attach($user, array('status' => "Pending"));

        return redirect('/friends');
    }

    public function update(Request $request){
        // dd($request->all());

        $validatedData = $request->validate([
            'Cpassword' => 'required|alpha_num|min:6',
            'Npassword' => 'alpha_num|min:6',
            'CNpassword' => 'alpha_num|min:6|same:Npassword',
            'fullname' => 'required',
            'photo' => 'mimes:jpg,png|file|max:100'
        ],
        [
            'Cpassword.required' => "Current password must be filled",
            'Cpassword.min' => "Current password must be at least 6 characters",
            'Npassword.alpha_num' => "New password must only contain letters and numbers",
            'Npassword.min' => "New password must be at least 6 characters",
            'CNpassword.alpha_num' => "Confirm new password must only contain letters and numbers.",
            'CNpassword.min' => "Confirm new password must be at least 6 characters",
            'fullname.required' => "Fullname must be filled",
            'photo.file' => "Profile extension must be .jpg or .png",
            'photo.max' => "Profile size must be less than 100 KB",
        ]
        );

        $user = User::find(Auth::user()->id);
        if(Hash::check($request->Cpassword, auth()->user()->password)){
            // dd("ads");
            if($request->Npassword && $request->CNpassword){
                $request->Npassword = Hash::make($request->Npassword);
                $user->password =  $request->Npassword;
            }
            if($request->photo){
                // MOVE TO STOREAGE
                // $user->photo = $request->photo;
                $fileName = date("Ymd_His") . "."  . $request->photo->getClientOriginalExtension();

                $request->photo->move(public_path('images'), $fileName);

                $user->profile_picture = $fileName;
            }
        }

        // if($request->CNpassword && $request->Npassword){

        // }

        $user->fullname =$request->fullname;

        $user->save();


        return redirect('/home');
    }

    public function edit(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile', compact('user'));
    }
}
