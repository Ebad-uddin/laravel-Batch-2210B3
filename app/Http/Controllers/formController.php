<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Form;
class formController extends Controller
{
    public function register(){
        $url = url('/form');
        $title = "User Registration Form";
        $data = compact('url', 'title');
        return view('form')->with($data);
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
    public function std_edit($id){
        $data = Form::find($id);
        // dd($data);
        $url = url('/std/update')."/". $id;
        $title = "Update User Information";
        $records = compact('data', 'url', 'title');
        return view('form')->with($records);
    }
    public function std_update($id, Request $request){ 
        $data = Form::find($id);
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->password = $request['password'];
        $data->save();
        return redirect('std/view');
    }

}
