<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function thankYou()
    {
        return view('thank-you');
    }
    public function contactIndex()
    {
         $contacts = Contact::where('user_id', Auth::user()->id) 
                            ->orderBy('id', 'DESC')->paginate(2);
        
         return view('contacts', compact('contacts'));
    }
    public function addContactIndex()
    {
        return view('add-contact');
    }
}
