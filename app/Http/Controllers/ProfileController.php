<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Admin;
use Intervention\Image\Exception\NotReadableException;
use Image;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request,$id): RedirectResponse
    {

        $validateDate=$request->validate([
            'nom'=>'required|string',
            'prenom'=>'required|string',



    ]);

    $save= Admin::find($id);
    $save->name=$request->nom;
    $save->prenom=$request->prenom;
    $save->adresse=$request->adresse;
    $save->telephone=$request->tel;
    $save->update();

    return Back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }









    public function update_profile(request $request,$id){

        $validateDate=$request->validate([
            'image'=>'required|image|mimes:jpg,png,jiff,svg,jpeg|Max:2048'
    ]);
    $save=Admin::find($id);
    if($request->hasfile('image')){
        $destination="photo/profile/".$save->profile_photo_path;
        if(File::exists($destination)){
           File::delete($destination);
        }
       $file= $request->file('image');
       $extension= $file->getClientOriginalExtension();
       $filename= time(). '.'. $extension;
       $file->move('photo/profile/',$filename);
       $save->profile_photo_path=$filename;
   }else{
       return $request ;
       $save->profile_photo_path='';
   }
   $save->update();
   return BACK()->with('message',"Profile modifier !");

    }
}
