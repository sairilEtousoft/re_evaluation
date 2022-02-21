<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function index(){
        return view('files.upload');
    }

    public function store(Request $request){
        
        $file = $request->file('file');

        $filename = time().'_'.$file->getClientOriginalName();
        try{
            $path = $file->storeAs('uploads', $filename, 'public');
        }catch(Exception $e){
            return back()->withErrors('Something went wrong in storing your file.');
        }
        return redirect('/users')->with('success', 'File successfuly stored.');


    }
}
