<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Models\FileUpload;
use Auth;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function create(FileUploadRequest $request)
    {
        $file = $request->file('fileUpload');
        $path = $file->store('public/uploads');
        $fileUpload = new FileUpload;
        $fileUpload->path = 'public/uploads';
        $fileUpload->name = $file->getClientOriginalName();
        $fileUpload->type = $file->getMimeType();
        $fileUpload->size = $file->getSize();
        $fileUpload->user_id = Auth::id();
        $fileUpload->save();

        return redirect('/file');
    }

    public function index()
    {
        $listFileUploaded = FileUpload::all();
        return view('welcome', ['listFile' => $listFileUploaded]);
    }

    public function delete($id)
    {
        $res = FileUpload::find($id)->delete();
        if ($res) {
            return redirect('/file');
        }
    }
}
