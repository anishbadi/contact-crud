<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ImportFileRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    protected $contactServices;

    public function __construct(ContactService $contactServices)
    {
        $this->contactServices = $contactServices;
    }

    /**
     * Display a listing of the contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contactServices->getAllContact();
        $data = ["contacts" => $contacts];
        return view('contact/index', $data);
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact/create');
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param App\Http\Requests\ContactRequest $request
     * @return Illuminate\Support\Facades\Redirect
     */
    public function store(ContactRequest $request)
    {
        $this->contactServices->storeContact($request->only(['name', 'email', 'phone_number', 'address']));
        return redirect()->route('contact.index')->with('message', config('message.contact_store'));
    }

    /**
     * Display the specified contact.
     *
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $data = ["contact" => $contact];
        return view('contact/show', $data);
    }

    /**
     * Show the form for editing the specified contact.
     *
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $data = ["contact" => $contact];
        return view('contact/edit', $data);
    }

    /**
     * Update the specified contact in storage.
     *
     * @param App\Http\Requests\ContactRequest $request
     * @param \App\Contact $contact
     * @return Illuminate\Support\Facades\Redirect
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $this->contactServices->updateContact($contact->id, $request->only(['name', 'email', 'phone_number', 'address']));
        return redirect()->route('contact.index')->with('message', config('message.contact_update'));
    }

    /**
     * Remove the specified contact from storage.
     *
     * @param \App\Contact $contact
     * @return Illuminate\Support\Facades\Redirect
     */
    public function destroy(Contact $contact)
    {
        $this->contactServices->deleteContact($contact->id);
        return redirect()->route('contact.index')->with('message', config('message.contact_delete'));
    }

    /**
     * Import contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        return view('contact/import');
    }

    /**
     * Import contact store.
     *
     * @param App\Http\Requests\ImportFileRequest $request
     * @return Illuminate\Support\Facades\Redirect
     */
    public function importStore(ImportFileRequest $request)
    {
        $this->contactServices->importStore($request);
        return redirect()->to('contact')->with('message', config('message.contact_import'));
    }
}
