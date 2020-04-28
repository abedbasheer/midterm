<?php

namespace App\Http\Controllers;

use App\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = contact::all();

        return view('contact.index',compact('contacts'));
    }
    public function create(){
        return view('contact.create');
    }
    public function store(Request $request){
        $request -> validate([
            'username'=> 'required',
            'useremail'=> 'required',
            'userphone'=> 'required',
        ]);
       $contact = new contact();
       $contact -> name = $request -> username;
       $contact -> email = $request -> useremail;
       $contact -> phone = $request -> userphone;

       $contact -> save();

       return redirect() -> back();
    }
    public function edit(Contact $contact){
//$contact = contact::findOrFail($id);

return view('contact.create',compact('contact'));
    }
    public function update(Request $request, Contact $contact){
        $request -> validate([
            'username'=> 'required',
            'useremail'=> 'required',
            'userphone'=> 'required',
        ]);
       // $contact = contact::findOrFail($id);
        $contact -> name = $request -> username;
        $contact -> email = $request -> useremail;
        $contact -> phone = $request -> userphone;
        $contact -> save();

       return redirect('/contact');
    }
    public function delete($id){
        
        $contact = contact::find($id);
        contact::delete($id);
        return redirect()->back();
    }
}
