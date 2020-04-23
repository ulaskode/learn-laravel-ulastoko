<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests\Admin\AdminSaveProfile;
use App\Http\Requests\ChangePassword;
use Image;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
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
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    /**
     * Show the form for specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Admin $admin)
    {
       return view('admin.profile.edit',compact('admin'));
    }

    /**
     * Update specified from Edit Profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveProfile(AdminSaveProfile $request, Admin $admin)
    {
        $update = $admin->update($request->validated());

        if($update){
           return redirect(route('admin.profile',$admin->username))->with('success','Profile has been updated.');
        }else{
            return redirect(route('admin.profile',$admin->username))->with('error','Ops... something went wrong when updating your data');
        }
    }

    /**
     * Update specified from Edit Profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savePhoto(Request $request, Admin $admin)
    {
        $this->validate($request,[
            'photo'=> 'image|mimes:jpg,jpeg,png'
        ]);
        
        $storagePath = public_path('images/admin');
        if(!File::isDirectory($storagePath))
        {
            File::makeDirectory($storagePath,666,true);
        }

        $file = $request->file('photo');
        $fileName = Carbon::now()->timestamp . '_' . $admin->username . '.' . $file->getClientOriginalExtension();
        $uploadFile = Image::make($file)->resize(160,160)->save($storagePath . '/' . $fileName);
        
        if($uploadFile){
            $update = $admin->update(['photo' => 'admin/'.$fileName]);
            if($update){
                return redirect()->back()->with('success','Photo profile has been updated.');
            }else{
                return redirect()->back()->with('error','Ops... something went wrong when uploading your photo.');
            }
        }else{
            return redirect()->back()->with('error','Ops... maybe server error. Try Again!');
        }
    }
    
    /**
     * Show the form for edit password user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword(Admin $admin)
    {
        return view('admin.profile.password',compact('admin'));
    }

    /**
     * Update specified from Edit Password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savePassword(ChangePassword $request, Admin $admin)
    {
       $update = $admin->update(['password' => Hash::make($request->new_password)]);
        if($update){
            return redirect(route('admin.password',$admin->username))->with('success','Password has been updated.');
        }else{
            return redirect(route('admin.password',$admin->username))->with('error','Ops... something went wrong when updating your data');
        }
    }

}
