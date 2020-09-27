<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $contacts = Contact::where('user_id', $user->id)->paginate(10);
        return view('home', compact('contacts'));
    }

    public function search (Request $request) 
    {
        if ($request->has('search')) {
                               
            $contacts = Contact::where('name', 'LIKE', "%{$request->search}%")
                                ->orwhere('surname', 'LIKE', "%{$request->search}%")
                                ->orwhere('email', 'LIKE', "%{$request->search}%")
                                ->orwhere('contact_number', 'LIKE', "%{$request->search}%")
                                ->get();
            $contacts = $contacts->where('user_id', auth()->user()->id);
            $search = true;
            return view('home', compact('contacts', 'search'));
        }
        return self::index();
    }
}
