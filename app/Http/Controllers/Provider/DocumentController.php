<?php

namespace App\Http\Controllers\Provider;

use App\Document;
use App\DocumentTypesAndUserTypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class DocumentController extends Controller
{
    public function documentUpload(Request $request){
        $request->validate([
            'document_type_id' => 'required',
            'document' => 'required|image',
        ]);

        $document = new Document();
        $document->user_id = Auth::user()->id;
        $document->document_type_id = $request->document_type_id;

        if ($request->hasFile('document')) {
            $image             = $request->file('document');
            $folder_path       = 'assets/uploads/images/provider/document/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->resize(500, 500)->save($folder_path.$image_new_name);

            $document->document = $folder_path.$image_new_name;
            $document->extention = $image->getClientOriginalExtension();
        }
        try {
            $document->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully updated document',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong'.$exception,
            ]);
        }
    }
}
