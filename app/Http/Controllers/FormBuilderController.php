<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormBuilderController extends Controller
{
    public function index(){
        $forms=Form::orderBy('created_at', 'desc')->get();
        return view('pages.index',compact('forms'));
    }
    public function createPage(){
        return view('pages.create');
    }
    public function save(Request $request){
        $data = new Form(); 
        $data->name = $request->name;      
        $data->code=$request->data;
        $data->save();
        return redirect()->back();
    }
    public function show($id)
    {
        $formData=Form::findOrFail($id);
        // $formData=json_encode($formData->code,JSON_UNESCAPED_SLASHES);
        // $formData=str_replace('\/','/',json_encode($formData));
        return view('pages.show',compact('formData'));
        //  return response()->json($formData);
    }
    public function send(Request $request,$id)
    {
        dd($request);
    }
    public function delete($id)
    {
        $form=Form::findOrFail($id);
        $form->delete();
        return redirect()->back();
    }
}
