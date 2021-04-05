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
        // dd(phpinfo());
        $file = $request->file('imageInput');
        dd($_FILES['imageInput']['type'].'**'.$_FILES['imageInput']['tmp_name'].'**'.$_FILES['imageInput']['size'].'Error:'.$_FILES['imageInput']['error']);
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
        $file_path = public_path().'new_folder';
        if(\is_dir($file_path)){
            $contents = scandir($file_path);
            $contents = array_diff($contents, array('.', '..'));;
            // \fopen($file_path.'test.txt', 'w+');
            // \fclose();
            $fileArr = array();
            foreach(\glob($file_path."/*.txt") as $f){
                $fileArr['name'] = basename($f); 
                $fileArr['size'] = filesize($f).' bytes'; 
            }
            print_r($fileArr);
        }else{
            mkdir($file_path);
            echo 'created';
        }        
        die();
        $file = public_path().'/testScheduler.txt';
        if(file_exists($file)){
            // Attempt to open the file
            $handle = fopen($file, "a+");     //required for fread
            // $content = \fread($handle, \filesize($file));   //readfile func of php is easy way
            // $content = \readfile($file);   //readfile func of php is easy way
            // $content = \file_get_contents($file) or die('File not loaded');
            //    fwrite($handle, 'hiiiiiiii');
                \file_put_contents($file, ' HELOOOOOO', FILE_APPEND);
               $content = file($file);
            \fclose($handle);

            print_r($content);
        } else{
            echo "ERROR: File does not exist.";
        }
        // \fopen($file, 'r+');
        // $content = Storage::get('storage/laravel.png');
        // return view('getfile');
    }

    public function downloadfile(){
        $file= public_path(). "/1616839389.png";
        return response()->download($file, 'laraveltest.png');
    }
}
