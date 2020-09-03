<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Mail\NotificationRegister;

class ContactController extends Controller
{
    public function index () 
    {
        $user = auth()->user();
        $contacts = Contact::where('user_id', $user->id)->paginate(10);
        return view('home', compact('contacts'));
    }

    public function create ()
    {
        return view('contacts.create');
    }

    public function store (Request $request)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required'
        ]);

        $user = auth()->user();
        $contact = new Contact([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'contact_number' => $request->get('contact_number'),
            'user_id' => $user->id,
        ]);
        $contact->save();
        \Mail::to($request->email)->send(new NotificationRegister());

        return redirect('/contacts')->with('success', 'Contacto guardado!');
    }

    public function show (Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit (Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update (Request $request, Contact $contact)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required'
        ]);
        $contact->update($request->all());
        return redirect('/contacts')->with('success', 'Contacto actualizado!');
    }

    public function destroy (Contact $contact)
    {
        $contact->delete();
        return redirect('/contacts')->with('success', 'Contacto borrado!');
    }
}
