<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::orderby('lastname','asc')->get();

        return view('contacts',[
            'contacts' => $contacts
        ]);
    }

    public function store(Request $request)
    {
         $this->validate($request,[
                'firstname'=>'required|max:255',
                'lastname'=>'required|max:255',
                //validator aanpassen voor email
                'email'=>'required|max:255',
            ]);



        $contact = new Contact;
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->save();

        return redirect('/');


    }

    public function destroy(Contact $contact)
    {
        $id= $contact->id;
        Contact::findOrfail($id)->delete();

        return redirect('/');

    }
}   
