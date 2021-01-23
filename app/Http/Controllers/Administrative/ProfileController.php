<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('administrative.profile.edit', compact('user'));
    }
    public function update_self_profile(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users,phone,' . Auth::user()->id,
            'email' => 'required|unique:users,email,' . Auth::user()->id,
            // 'avatar' => 'required|image',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $image             = $request->file('avatar');
            $folder_path       = 'assets/uploads/images/profile/';
            $image_new_name    = Str::random(20) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->resize(500, 500)->save($folder_path . $image_new_name);
            $user->avatar = $folder_path . $image_new_name;
        }
        try {
            $user->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully updated',
                'url' => route('administrative.profile.edit', Auth::user()->id),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong',
            ]);
        }
    }
    public function update_self_account(Request $request)
    {
        $request->validate([
            'username' => 'unique:users,username,' . Auth::user()->id,
            'is_active_email' => 'nullable|boolean',
            'is_active_sms' => 'nullable|boolean',
            'is_active_phone' => 'nullable|boolean',
            'language' => 'required|exists:languages,code',
            // 'time_zone' => 'required',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->username = $request->username;
        $user->is_active_email = $request->is_active_email;
        $user->is_active_sms = $request->is_active_sms;
        $user->is_active_phone = $request->is_active_phone;
        $user->language = $request->language;

        try {
            $user->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully updated',
                'url' => route('administrative.profile.edit', Auth::user()->id),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'type' => 'error',
                'message' => 'Something going wrong' . $exception,
            ]);
        }
    }
    public function change_self_password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'

        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->password);
                User::where('id', Auth::user()->id)->update(array('password' =>  $users->password));
                return back()->withToastSuccess( 'Password updated successfully');
            } else {
                return back()->withErrors( 'New password can not be the old password !');
            }
        } else {
            return back()->withErrors('Old password doesnt matched !');
        }
    }
}
