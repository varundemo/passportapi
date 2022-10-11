<?php
 
namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;

class FileController extends Controller
{
 
    public function index()
    {
        return view('file');
    }
 
    public function store(Request $request)
    {
        // dd($request->all());
       request()->validate([
         'file'  => 'required|mimes:doc,docx,pdf,txt|max:2048',
       ]);
  
       $extension = $request->file->getClientOriginalExtension();
        if ($files = $request->file('file') && $extension == "pdf") {

        
                //store file into document folder
                $file = $request->file->store('public/documents');
    
                //store your file into database
                // $document = new Document();
                $document = new Document();
                $document->title = $file;
                $document->save();
                
                return Response()->json([
                    "success" => true,
                    "file" => 'file Uploaded'
                ]);
        
            
  
        }
  
        return Response()->json([
                "success" => false,
                "file" => 'Unable to upload file, only pdf format'
          ]);
  
    }
}