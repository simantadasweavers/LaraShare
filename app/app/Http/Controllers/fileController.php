<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Hash;


class fileController extends Controller
{
    public function upload(Request $request){
        // default file accept limit 2GB
        $request->validate([
            'formFile' => 'required|max:2097152'
        ]);

        $file = $request['formFile'];
        $passcode = $request['passcode'];
        $title = $request['title'];
        $msg = $request['message'];

        $file = new Files;
        // saving the file
        $public_des_path='public/files';
        $fname = $request->file('formFile');
        $file->filename = $fileHashName = $fname = $request->file('formFile')->store('');
        $request->file('formFile')->storeAs($public_des_path,$fname);
        $request->file('formFile')->move('files/',$fname);

        if($passcode){
            $file->passcode = $fileHash = Hash::make($passcode);
        }
        else{ $fileHash = null; }
        $file->title=$title;
        $file->msg=$msg;
        $file->ip=$_SERVER['REMOTE_ADDR'];
        $file->date=date("Y/m/d");
        date_default_timezone_set("Asia/Kolkata");
        $file->time=date("h:i:sa");;
        $file->save();

        return view('link',['hashname'=>$fileHashName,'passcode'=>$fileHash]);
    }

    public function process(string $name,string $passcode = null){
        $fileName = $name;
        $passCode = $passcode;

        $file = Files::where('filename',$fileName)->first();

        if($file->passcode){
            return view('download/withpass',['filename'=>$fileName]);
        }
        else{
            return view('download/download',['file'=>$fileName]);
        }
    }

    public function passCodeValid(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        $request->validate([ 
            'filename' => 'required',
            'passcode' => 'required'
        ]);

        $file = $request['filename'];
        $code = $request['passcode'];

        $file = Files::where('filename',$file)->first();

        if($file->fileid){
            if($file->filename == $file || Hash::check($code, $file->passcode)){
                return view('download/download',['file'=>$file->filename]);
            }
            else{
                echo "<font style='color:blue;font-size:20px;'>passcode not match!! try again!</font>";
            }
        }
        else{
            echo "<font style='color:red;font-size:20px;'>file not exist!!</font>";
        }
    }
    
}
