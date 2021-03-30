<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
class UploadFile extends Controller
{
    public function uploadimage(Request $request)
    {
        // $request->all()->validate([
        //     'imageInput'=>'mimetypes:text/plain,png,jpg'
        // ]);
        $file = $request->file('imageInput');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path1 = public_path().'/'.$filename;
        $path2 = public_path(). '/';
        // dd(public_path().'*****'.base_path());
        $file->move($path2, $filename);
        $fileModel = new File();
        $fileModel->name = $filename;
        $fileModel->path = $path1;
        $fileModel->save();
        // $file = $request->file('imageInput');
        // $fileName = $file->getClientOriginalName();
        // $filepath = $file->getRealPath();
        // $filext = $file->getClientOriginalExtension();
        // $filsize = $file->getSize();
        // $mime = $file->getMimeType();
        // $request->file('imageInput')->storeAs('storage', $fileName);
        $request->session()->flash('fileset', 'File uploaded successfully!');
        return back();
    }

    public function getFile()
    {
        // $content = Storage::get('storage/laravel.png');
        return view('getfile');
    }

    public function downloadfile(){
        $file= public_path(). "/1616839389.png";
        return response()->download($file, 'laraveltest.png');
    }
}
