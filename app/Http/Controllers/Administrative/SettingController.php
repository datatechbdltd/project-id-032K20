<?php

namespace App\Http\Controllers\Administrative;

use App\ApplicationSeo;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    //get identity page
    public function identity(){
        return view('administrative.setting.identity');
    }

    //get contact page
    public function contact(){
        return view('administrative.setting.contact');
    }

    // get seo page
    public function seo(){
        $seo = ApplicationSeo::all();
        return view('administrative.setting.seo', compact('seo'));
    }

    // get oAuth page
    public function oAuth(){
        return view('administrative.setting.oauth');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    // Static image of application
    public function updateIdentityImage(Request $request){
        $request->validate([
           'type' => 'required|string',
            $request->type => 'required|image'
        ]);
        if ($request->type == 'website_logo' && $request->hasFile($request->type)) {        //****Website logo
            $image             = $request->file($request->type);
            $folder_path       = 'assets/uploads/images/setting/';
            $image_new_name    = $request->type.'-'.Carbon::now()->format('d-m-Y H-i-s') .'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->fit(134, 38, function($constraint){
                $constraint->aspectRatio();
            })->save($folder_path.$image_new_name);
            //to db
            try {
                if (get_static_option('website_logo') != null)
                    File::delete(public_path(get_static_option('website_logo'))); //Old image delete
                update_static_option('website_logo', $folder_path.$image_new_name);
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully updated',
                    'image_src' => $folder_path.$image_new_name,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something going wrong',
                ]);
            }
        }else if ($request->type == 'favicon' && $request->hasFile($request->type)) {           //****Favicon
            $image             = $request->file($request->type);
            $folder_path       = 'assets/uploads/images/setting/';
            $image_new_name    = $request->type.'-'.Carbon::now()->format('d-m-Y H-i-s') .'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->crop(64, 64)->save($folder_path.$image_new_name);
            //to db
            try {
                if (get_static_option('favicon') != null)
                    File::delete(public_path(get_static_option('favicon'))); //Old image delete
                update_static_option('favicon', $folder_path.$image_new_name);
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully updated',
                    'image_src' => $folder_path.$image_new_name,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something going wrong',
                ]);
            }
        }else if ($request->type == 'we_accept' && $request->hasFile($request->type)) {         //****We accept
            $image             = $request->file($request->type);
            $folder_path       = 'assets/uploads/images/setting/';
            $image_new_name    = $request->type.'-'.Carbon::now()->format('d-m-Y H-i-s') .'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->fit(100, 21)->save($folder_path.$image_new_name);
            //to db
            try {
                if (get_static_option('we_accept') != null)
                    File::delete(public_path(get_static_option('we_accept'))); //Old image delete
                update_static_option('we_accept', $folder_path.$image_new_name);
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully updated',
                    'image_src' => $folder_path.$image_new_name,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something going wrong',
                ]);
            }
        }else if ($request->type == 'meta_image' && $request->hasFile($request->type)) {            //****Meta image
            $image             = $request->file($request->type);
            $folder_path       = 'assets/uploads/images/setting/';
            $image_new_name    = $request->type.'-'.Carbon::now()->format('d-m-Y H-i-s') .'.'. $image->getClientOriginalExtension();
            //resize and save to server
            Image::make($image->getRealPath())->fit(1200, 627 )->save($folder_path.$image_new_name);
            //to db
            try {
                if (get_static_option('meta_image') != null)
                    File::delete(public_path(get_static_option('meta_image'))); //Old image delete
                update_static_option('meta_image', $folder_path.$image_new_name);
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully updated',
                    'image_src' => $folder_path.$image_new_name,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something going wrong',
                ]);
            }
        }else{
            return response()->json([
                'type' => 'error',
                'message' => 'Image type unknown',
            ]);
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // Static color of application
    public function updateIdentityColor(Request $request){
        $request->validate([
            'hero_bg' => 'required|string'
        ]);
        try {
            update_static_option('website_hero_bg_color', $request->input('hero_bg'));
            return back()->withToastSuccess('Successfully updated!');
        }catch (\Exception $exception){
            return back()->withErrors( 'Something going wrong.');
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // company contact information
    public function updateContact(Request $request){
        $request->validate([
           'email'          => 'required|email',
           'phone'          => 'required|string',
           'footer_credit'  => 'required|string'
        ]);
        try {
            update_static_option('company_main_email', $request->input('email'));
            update_static_option('company_main_phone', $request->input('phone'));
            update_static_option('website_footer_credit', $request->input('footer_credit'));
            return back()->withToastSuccess('Successfully updated!');
        }catch (\Exception $exception){
            return back()->withErrors( 'Something going wrong.');
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // meta tag and description
    public function updateSeo(Request $request){
        $request->validate([
           'author'       => 'required|string',
           'description'  => 'required|string',
           'keyword'      => 'required|string',
           'language_code'      => 'required|exists:languages,code',
        ]);
        if (ApplicationSeo::where('language_code', $request->language_code)->exists()){
            $seo = ApplicationSeo::where('language_code', $request->language_code)->first();
        }else{
            $seo = new ApplicationSeo();
        }
        $seo->language_code     = $request->language_code;
        $seo->author            = $request->author;
        $seo->description       = $request->description;
        $seo->keyword           = $request->keyword;
        try {
            $seo->save();
            return back()->withToastSuccess('Successfully updated!');
        }catch (\Exception $exception){
            return back()->withErrors( 'Something going wrong.');
        }
    }

    /**
     * @param Request $request
     * type, status, google, facebook, instagram, twitter, github, linkedin
     * status can be Enable|Disable
     * type can be google, facebook, instagram, twitter, github, linkedin
     */
    public function updateOAuth(Request $request){
        $request->validate([
            'type' => 'required|string',
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
            'status' => 'nullable|string',
        ]);

        if ($request->input('type') == 'google' || $request->input('type') == 'facebook' || $request->input('type') == 'instagram' || $request->input('type') == 'twitter' || $request->input('type') == 'github' || $request->input('type') == 'linkedin'){
            try {
                if ($request->input('status') == 'Enable'){
                    update_static_option($request->input('type').'_o_auth_status', 'Enable');
                }else{
                    update_static_option($request->input('type').'_o_auth_status', 'Disable');
                }
                update_static_option($request->input('type').'_client_id', $request->input('client_id'));
                update_static_option($request->input('type').'_client_secret', $request->input('client_secret'));

                $env_val[strtoupper($request->input('type')).'_CLIENT_ID'] = !empty($request->client_id) ? $request->client_id : 'YOUR_CLIENT_ID';
                $env_val[strtoupper($request->input('type')).'_CLIENT_SECRET'] = !empty($request->client_secret) ? $request->client_secret : 'YOUR_SECRET';

                setEnvValue([
                    strtoupper($request->input('type')).'_CLIENT_ID' => '"'.$env_val[strtoupper($request->input('type')).'_CLIENT_ID'].'"',
                    strtoupper($request->input('type')).'_CLIENT_SECRET' =>  '"'.$env_val[strtoupper($request->input('type')).'_CLIENT_SECRET'].'"'
                ]);

                return redirect()->back()->withToastSuccess('Successfully oAuth updated!');
            }catch (\Exception $exception){
                return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
            }
        }else{
            return redirect()->back()->withErrors('Type unknown');
        }
    }
}
