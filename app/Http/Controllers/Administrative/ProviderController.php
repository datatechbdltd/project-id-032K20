<?php

namespace App\Http\Controllers\Administrative;

use App\Document;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function approveProviderDocument(Request $request){
        $request->validate([
            'document_id'=>'required',
        ]);

        $document = Document::findOrFail($request->document_id);
        $document->is_approved = true;
        $document->authorized_by_id = Auth::user()->id;

        try {
            $document->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully approved document',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong'.$exception,
            ]);
        }
    }

    public function rejectProviderDocument(Request $request){
        $request->validate([
            'document_id'=>'required',
        ]);

        $document = Document::findOrFail($request->document_id);
        $document->is_approved = false;
        $document->authorization_note = $request->note;
        $document->authorized_by_id = Auth::user()->id;

        try {
            $document->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully rejected document',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong'.$exception,
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$providers = User::role('provider')->orderBy('id', 'desc')->get();*/
        return view('administrative.provider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $provider = User::findOrFail($id);
        return view('administrative.provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
