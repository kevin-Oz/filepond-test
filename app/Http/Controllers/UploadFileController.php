<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    public function store(Request $request)
    {
        try {
            $fileRequest = $request->all();
                $file =  $fileRequest['file_'];
                $filename = $file->getClientOriginalName();
                $folder = uniqid().'-'.now()->timestamp;
                $path = $file->storeAs('test/'. $folder, $filename);
                return $folder;
           
        } catch (\Exception $e) {
            return response()->json(['Error'=> $e->getMessage()],500);
        }
    }

    public function delete(Request $request)
    {
        $fileId = request()->getContent();
        Storage::deleteDirectory('test/'.$fileId);
        //Storage::delete($fileId);
    }

}
