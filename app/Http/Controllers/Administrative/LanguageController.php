<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $languages = Language::orderBy('id', 'desc')->get();
        return view('administrative.language.index', compact('languages'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $content_of_json_file = file_get_contents(resource_path('lang').'/'.App::getLocale().'.json');
        $contents = json_decode($content_of_json_file);
        return view('administrative.language.create', compact( 'contents'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'language_name'      => 'required|string|min:2|max:12|unique:languages,name,',
            'language_code'      => 'required|string|min:2|max:12|unique:languages,code,',
            'language_flag_icon' => 'required|string|min:2|max:250',
            'language_status'    => 'required|boolean',
        ]);
        $language = new Language();
        $language->code = $request->language_code;
        $language->name     = $request->language_name;
        $language->status   = $request->language_status;
        $language->flag     = $request->language_flag_icon;

        $content = json_encode($request->word);
        if ($content === 'null') {
            return back()->withInfo('Please fill one minimum one field');
        }else{
            try {
                $language->save();
                file_put_contents(resource_path('lang/') . $language->code . '.json', $content);
                return redirect()->route('administrative.language.edit', $language->id)->withToastSuccess('Successfully added language-'.$language->name);
            }catch (\Exception $exception){
                return back()->withErrors('Something going wrong.');
            }
        }
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        if (Language::where('id', $id)->exists()){
            $language = Language::find($id);
            $content_of_json_file = file_get_contents(resource_path('lang').'/'.$language->code.'.json');
            $contents = json_decode($content_of_json_file);
            return view('administrative.language.show', compact('language', 'contents'));
        }else{
            return back()->withErrors( 'Something going wrong.');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (Language::where('id', $id)->exists()){
            $language = Language::find($id);
            $content_of_json_file = file_get_contents(resource_path('lang').'/'.$language->code.'.json');
            $contents = json_decode($content_of_json_file);
            return view('administrative.language.edit', compact('language', 'contents'));
        }else{
            return back()->withErrors('Something going wrong.');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (Language::where('id', $id)->exists()){
            $language = Language::find($id);
            $request->validate([
                'language_name'      => 'required|string|min:2|max:12|unique:languages,name,'.$id,
                'language_code'      => 'required|string|min:2|max:12|unique:languages,code,'.$id,
                'language_flag_icon' => 'required|string|min:2|max:250',
                'language_status'    => 'required|boolean',
            ]);
            $content = json_encode($request->word);
            if ($content === 'null') {
                return back()->withInfo('Please fill one minimum one field');
            }else{
                if ($request->language_code != $language->code){
                    //if language code means json file name is changed need to rename first.
                    rename(resource_path('lang/').$language->code . '.json', resource_path('lang/').$request->language_code . '.json');
                    $language->code = $request->language_code;
                }
                $language->name     = $request->language_name;
                $language->status   = $request->language_status;
                $language->flag     = $request->language_flag_icon;
                try {
                    $language->save();
                    file_put_contents(resource_path('lang/') . $language->code . '.json', $content);
                    return back()->withToastSuccess('Successfully updated!');
                }catch (\Exception $exception){
                    return back()->withErrors( 'Something going wrong.');
                }
            }
        }else{
            return back()->withErrors('Something going wrong.');
        }
    }

   /**
    * eturn \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Language::where('id', $id)->exists()){
            $language = Language::find($id);
            if ($language->code != 'en'){
                try {
                    unlink(resource_path('lang/').$language->code . '.json');
                    $language->delete();
                    return response()->json([
                        'type' => 'success',
                        'message' => 'successfully deleted !!! ',
                    ]);
                }catch (\Exception $exception) {
                    return response()->json([
                        'type' => 'danger',
                        'message' => 'Error something going wrong!!! ',
                    ]);
                }
            }else{
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Default language can\'t be deleted !!! ',
                ]);
            }
        }else{
            return response()->json([
                'type' => 'danger',
                'message' => 'Invalid language !!! ',
            ]);
        }
    }
}
