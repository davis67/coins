<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Contact;
use Countries;
use Auth;

class ContactsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $countries = Countries::all()->pluck('name.common');
        return view('contacts.create', compact("countries"));
    }

    public function getcontacts()
    {
        return Contact::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listContacts(Request $request)
    {
        $contacts = Contact::where("account_name", "LIKE", "%" . $request->account_name . "%")->limit(10)->get();

        if ($contacts) {
            return $contacts;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'account_name' => 'required|string',
            'contact_country' => 'required|string',
            'full_address' => 'required|string',
            'alternate_address' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'alternative_person' => 'nullable|string',
            'alternative_person_email' => 'nullable|email',
            'alternative_person_phone' => 'nullable|string',
        ]);

        $contact = Contact::create([
            "account_name" => $data['account_name'],
            'country' => $data['contact_country'],
            'full_address' => $data['full_address'],
            'alternate_address' => $data['alternate_address'],
            'contact_person' => $data['contact_person'],
            'contact_email' => $data['contact_email'],
            'contact_phone' => $data['contact_phone'],
            'alternative_person' => $data['alternative_person'],
            'alternative_person_email' => $data['alternative_person_email'],
            'alternative_person_phone' => $data['alternative_person_phone'],
            'created_by' => Auth::user()->id
        ]);
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getcontact($id)
    {
        $contact = contact::findOrFail($id);
        return $contact;
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact =  Contact::findOrFail($id);
        $countries = Countries::all()->pluck('name.common');
        return view("contacts.edit", compact("contact", "countries"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //return $request;
        //validate the received data
        $this->validate($request, [
            'account_name' => 'nullable|string',
            'contact_country' => 'required|string',
            'full_address' => 'nullable|string',
            'alternate_address' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'alternative_person' => 'nullable|string',
            'alternative_person_email' => 'nullable|email',
            'alternative_person_phone' => 'nullable|string',
        ]);

        $run = $contact->update([
            'account_name' => $request->account_name,
            'country' => $request->contact_country,
            'full_address' => $request->full_address,
            'alternate_address' => $request->alternate_address,
            'contact_person' => $request->contact_person,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'alternative_person' => $request->alternative_person,
            'alternative_person_email' => $request->alternative_person_email,
            'alternative_person_phone' => $request->alternative_person_phone,
            'updated_by' => Auth::user()->id
        ]);
        return Response::json($run);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        $contact->delete();
        return "success";
    }
}
