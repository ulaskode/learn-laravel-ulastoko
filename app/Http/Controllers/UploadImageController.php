<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Image;
use File;
use Carbon\Carbon;

class UploadImageController extends Controller
{

    public function __construct()
    {
        $this->path = storage_path('app/public/images');
    }

    public function saveAdminPhoto(Request $request, Admin $admin)
    {
        $this->validate($request,[
            'photo'=> 'image|mimes:jpg,jpeg,png'
        ]);

        if(!File::isDirectory($this->path))
        {
            File::makeDirectory($this->path);
        }

        $file = $request->file('photo');


    }
}
