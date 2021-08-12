<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    public function store(Request $request)
    {

        try {
            if($request->hasFile('file_')){

                $file = $request->file('file_');
                $filename = $file->getClientOriginalName();
                $folder = uniqid().'-'.now()->timestamp;
                
                $file->storeAs('test/'. $folder, $filename);
            
                return $folder;
    
            }else{
                return '';
            }
        } catch (\Exception $e) {
            return response()->json(['Error'=> $e->getMessage()],500);
        }
    }

    public function delete(Request $request)
    {

        dd($request);
        Storage::delete('filename.txt');
    }
}
