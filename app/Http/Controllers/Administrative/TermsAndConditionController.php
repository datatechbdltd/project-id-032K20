<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use App\TermsAndCondition;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termandconditions = TermsAndCondition::orderBy('id', 'DESC')->get();
        return view('administrative.term-conditions.index', compact('termandconditions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrative.term-conditions.create');
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
            'status' => 'required',
            'serial' => 'required|unique:terms_and_conditions,serial',
            'title' => 'required',
            'description' => 'required',
        ]);
        $termandcondition = new TermsAndCondition();
        $termandcondition->status  =   $request->input('status');
        $termandcondition->serial  =   $request->input('serial');
        $termandcondition->title  =   $request->input('title');
        $termandcondition->description  =   $request->input('description');

        try {
            $termandcondition->save();
            session()->flash('success', 'Terms and condition create successfully');
            return redirect()->route('administrative.terms-condition.index');
        }catch (\Exception $exception){
            session()->flash('error', 'Data create not found!!!');
            return redirect()->back();
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
        $termandcondition=TermsAndCondition::findOrFail($id);
        return view('administrative.term-conditions.edit', compact('termandcondition'));
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
        $request->validate([
            'status' => 'required',
            'serial' => 'required|unique:terms_and_conditions,serial,'.$id,
            'title' => 'required',
            'description' => 'required',
        ]);
        $termandcondition = TermsAndCondition::findOrFail($id);
        $termandcondition->status  =   $request->input('status');
        $termandcondition->serial  =   $request->input('serial');
        $termandcondition->title  =   $request->input('title');
        $termandcondition->description  =   $request->input('description');

        try {
            $termandcondition->save();
            session()->flash('success', 'Terms and condition Update successfully');
            return redirect()->route('administrative.terms-condition.index');
        }catch (\Exception $exception){
            session()->flash('error', 'Data create not found!!!');
            return redirect()->back();
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
        $termandcondition = TermsAndCondition::findOrFail($id);
        $termandcondition->destroy($termandcondition->id);
        session()->flash('success', 'Terms and condition delated successfully');
        return redirect()->back();
    }
}
