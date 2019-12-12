<?php

namespace App\Http\Controllers;
use App\Http\Requests\LanguageExampleRequest;
use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $languages= Language::all();
        return view('language.ViewLanguage', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageExampleRequest $request)
    {
        //
   
        $language = new Language;
        $language->Name  = $request ->Name;
        // dd($language->Name);
        $language ->save();
        return redirect('language')->with('success', 'Bạn đã thêm ngon ngu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $languages=Language::find($id);
        return view('language.Edit',['laguages'=>$languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageExampleRequest $request, $id)
    {
        $languages=Language::find($id);
        $languages->Name=$request->Name;
        $languages->save();
        return redirect('language')->with('success', 'Bạn đã sửa dịch vụ thành công');
        // return view('language.ViewLanguage',compact('$languages'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
    }
    public function delete($id)
    {
        
        
         $language = Language::find($id);
         
      
         $language->delete();
         return redirect()->back()->with('success', 'Successfully delete');
    }
}
