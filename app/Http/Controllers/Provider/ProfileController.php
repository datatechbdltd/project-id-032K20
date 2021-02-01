<?php

namespace App\Http\Controllers\Provider;

use App\DocumentType;
use App\User;
use App\DocumentTypesAndUserTypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit()
    {
        $user = Auth::user();
        return view('provider.profile.edit', compact('user'));
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

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'language' => 'required',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->language = $request->language;

        if ($request->hasFile('avatar')) {
            if ($user->avatar != null)
                File::delete(public_path($user->avatar)); //Old image delete
            $image             = $request->file('avatar');
            $folder_path       = 'assets/uploads/images/profile/';
            $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->resize(500, 500)->save($folder_path.$image_new_name);
            $user->avatar=$folder_path.$image_new_name;
        }

        try {
            $user->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully updated profile',
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong'.$exception,
            ]);
        }
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
