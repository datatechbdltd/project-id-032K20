<?php

namespace App\Http\Controllers\Administrative;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $currencies = Currency::orderBy('id', 'desc')->get();
        $current_currency_data =  Http::get('https://openexchangerates.org/api/latest.json', [
            'app_id' => '6f3c784068814d8ab27caa3e4f20425c'
        ]);
        $rate = json_decode($current_currency_data, true)['rates'];
        return view('administrative.currency.index', compact('currencies', 'rate'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('administrative.currency.create', compact( 'contents'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
           'currency_code'  =>  'required|string|min:1|max:5|unique:currencies,code',
           'currency_name'  =>  'required|string|min:1|max:15',
           'currency_sign'  =>  'required|string|min:1|max:3',
           'currency_status'    =>  'nullable|boolean'
        ]);
        $currency = new \App\Currency();
        $currency->status =     $request->input('currency_status', false);
        $currency->code =       $request->input('currency_code');
        $currency->name =       $request->input('currency_name');
        $currency->sign =       $request->input('currency_sign');
        try {
            $currency->save();

            return redirect()->back()->withToastSuccess('Successfully added currency-'.$currency->name);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
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
        //
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (Currency::where('id', $id)->exists()){
            $currency = Currency::find($id);
            if ($currency->code != 'USD'){
                try {
                    $currency->delete();
                    return redirect()->back()->withToastSuccess('Successfully deleted');
                }catch (\Exception $exception){
                    return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
                }
            }else{
                return redirect()->back()->withErrors('Default currency can\'t be deleted.');
            }
        }else{
            return redirect()->back()->withErrors('Invalid currency.');
        }
    }
}
