<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Auth;
class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => ['required', 'string'],
        ]);
        Contact::create([
            'user_id'    => Auth::user()->id,
            'name'       => $request['name'],
            'company'    => $request['company'],
            'phone'      => $request['phone'],
            'email'      => $request['email'],
        ]);

        return redirect()->route('all-contact')->with('success', 'Contact successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('edit-contact' ,compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        $contact->name   = $request['name'];
        $contact->company = $request['company'];
        $contact->phone = $request['phone'];
        $contact->email = $request['email'];
        $contact->save();
        $contacts = Contact::where('user_id', Auth::user()->id) 
                            ->orderBy('id', 'DESC')->paginate(2);


        return redirect()->route('all-contact')->with('success', 'Contact successfully updated');
        // return view('contacts', compact('contacts'))->with('success', 'Contact successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {

        $contact = Contact::find($contact->id);
        $contact->delete();
         return redirect()->back()->with('success', 'Contact successfully deleted!');
    }

     public function search(Request $request) {

        $contacts = Contact::where('name', 'LIKE', '%'.$request->search.'%')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('search', compact('contacts'));
    }
}
