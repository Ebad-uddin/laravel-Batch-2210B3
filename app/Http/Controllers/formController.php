<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Form;
class formController extends Controller
{
    public function register(){
        return view('form');
    }
    public function data(Request $request){
        print_r($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $students = new Form();
        $students->name = $request['name'];
        $students->email = $request['email'];
        $students->password = $request['password'];
        $students->save();
        return redirect('std/view');
    }
    public function std_view(){
        $stdData = Form::all();
        // print_r($stdData);
        // dd($stdData);
        $data = compact('stdData');
        return view('std-view')->with($data);
    }
    public function std_dlt($id){
        // echo $id;
        $find = Form::find($id)->delete();
        return redirect('std/view');
        
    }

}
