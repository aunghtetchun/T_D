<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(){
        return view('profile.edit');
    }
    public function changePassword(Request $request){

//        return $request;
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required','min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route('login');

    }

    public function changeName(Request $request){
        $request->validate([
            'name' => "required|min:3|max:50",
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->update();
        return redirect()->route("profile.edit")->with("toast","Name change Successful");
    }

    public function changeEmail(Request $request){
        $request->validate([
            'email' => "required|min:3|max:50",
            'acc' => "required|min:3|max:150",
            'payment' => "required|min:3",
        ]);
        $user = User::find(Auth::id());
        $user->email = $request->email;
        $user->acc = $request->acc;
        $user->payment = $request->payment;
        $user->update();
        return redirect()->route("profile.edit")->with("toast","Info change Successful");
    }

    public function changePhoto(Request $request){
        $request->validate([
            "photo" => "required|mimetypes:image/jpeg,image/png|dimensions:ratio=1/1|file|max:2500"
        ]);
        $dir="public/profile";
        $newName = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs($dir,$newName);

        $user = User::find(Auth::id());
        $user->photo = $newName;
        $user->update();

        return redirect()->route("profile.edit")->with("toast","Photo change Successful");

    }
}
