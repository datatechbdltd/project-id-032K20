<?php

namespace App\Http\Controllers\Administrative;

use App\DocumentAndUserType;
use App\DocumentType;
use App\DocumentTypesAndUserTypes;
use App\Http\Controllers\Controller;
use App\UserType;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document_type = DocumentType::orderBy('id', 'desc')->get();
        return view('administrative.document.index',compact('document_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_type = UserType::all();
        return view('administrative.document.create',compact('user_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'correct_example' => 'required|image',
            'false_example' => 'required|image',
            'is_active' => 'required|boolean',
            'user_role' => 'required|exists:user_types,id',
        ]);

        $document_type = new DocumentType();
        $document_type->name = $request->name;
        $document_type->is_active = $request->is_active;

        if ($request->hasFile('correct_example')) {
            $image             = $request->file('correct_example');
            $folder_path       = 'assets/uploads/images/setting/document/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->resize(500, 500)->save($folder_path.$image_new_name);
            $document_type->correct_example=$folder_path.$image_new_name;
        }
        if ($request->hasFile('false_example')) {
            $image             = $request->file('false_example');
            $folder_path       = 'assets/uploads/images/setting/document/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->resize(500, 500)->save($folder_path.$image_new_name);
            $document_type->false_example=$folder_path.$image_new_name;
        }
        try {
            $document_type->save();

            $user_types = explode(',', $request->input(['user_role']));
            foreach($user_types as $user_type){
                if(DocumentTypesAndUserTypes::where('user_type_id', $user_type)->where('document_type_id', $document_type->id)->exists()){
                    continue;
                }else{
                    if ($user_type){
                        $document_and_user_types = new DocumentTypesAndUserTypes();
                        $document_and_user_types->user_type_id = $user_type;
                        $document_and_user_types->document_type_id = $document_type->id;
                        $document_and_user_types->is_active = $document_type->is_active;
                        $document_and_user_types->save();
                    }else{
                        return response()->json([
                            'type' => 'error',
                            'message' => $user_type,
                            'url' => route('administrative.document.index'),
                        ]);
                    }

                }
            }
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully updated',
                'url' => route('administrative.document.index'),
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong'.$exception,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_type = UserType::all();
        $document_type = DocumentType::findOrFail($id);
        return view('administrative.document.edit',compact('user_type','document_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function documentUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'is_active' => 'required|boolean',
            'user_role' => 'required|exists:user_types,id',
            'document_type_id' => 'required',
        ]);

        $document_type = DocumentType::findOrFail($request->document_type_id);
        $document_type->name = $request->name;
        $document_type->is_active = $request->is_active;

        if ($request->hasFile('correct_example')) {
            if ($document_type->correct_example != null)
                File::delete(public_path($document_type->correct_example)); //Old image delete
            $image             = $request->file('correct_example');
            $folder_path       = 'assets/uploads/images/setting/document/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->resize(500, 500)->save($folder_path.$image_new_name);
            $document_type->correct_example=$folder_path.$image_new_name;
        }
        if ($request->hasFile('false_example')) {
            if ($document_type->false_example != null)
                File::delete(public_path($document_type->false_example)); //Old image delete
            $image             = $request->file('false_example');
            $folder_path       = 'assets/uploads/images/setting/document/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->resize(500, 500)->save($folder_path.$image_new_name);
            $document_type->false_example=$folder_path.$image_new_name;
        }
        try {
            $document_type->save();
            // delete first
            DocumentTypesAndUserTypes::where('document_type_id', $document_type->id)->delete();
            $user_types = explode(',', $request->input(['user_role']));
            foreach($user_types as $user_type){
                if(DocumentTypesAndUserTypes::where('user_type_id', $user_type)->where('document_type_id', $document_type->id)->exists()){
                    continue;
                }else{
                    if ($user_type){
                        $document_and_user_types = new DocumentTypesAndUserTypes();
                        $document_and_user_types->user_type_id = $user_type;
                        $document_and_user_types->document_type_id = $document_type->id;
                        $document_and_user_types->is_active = $document_type->is_active;
                        $document_and_user_types->save();
                    }else{
                        return response()->json([
                            'type' => 'error',
                            'message' => $user_type,
                            'url' => route('administrative.document.index'),
                        ]);
                    }
                }
            }
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully updated',
                'url' => route('administrative.document.index'),
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong'.$exception,
            ]);
        }
    }
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DocumentType::where('id', $id)->exists()){

            $document = DocumentType::find($id);
            try {
                if ($document->correct_example != null)
                    File::delete(public_path($document->correct_example)); //Old image delete
                if ($document->false_example != null)
                    File::delete(public_path($document->false_example)); //Old image delete
                $document->delete();
                DocumentTypesAndUserTypes::where('document_type_id',$id)->delete();
                return redirect()->back()->withToastSuccess('Successfully deleted');
            }catch (\Exception $exception){
                return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
            }
        }else{
            return redirect()->back()->withErrors('Invalid Document type.');
        }
    }
}
