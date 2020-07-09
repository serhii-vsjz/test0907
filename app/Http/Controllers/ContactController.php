<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('home', [
            'contacts' => $contacts,
        ]);
    }
    /**
     * Displays favorite contacts.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function favorites()
    {
        $user =  auth()->user();
        $contacts = $user->contacts;

        return view('home', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Adds сontact to favorites.
     *
     * @param Contact $contact
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addFavorite(Contact $contact)
    {
        $user =  auth()->user();
        $user->contacts()->attach($contact);

        return redirect()->back();
    }

    /**
     * Removes contact from favorites.
     *
     * @param Contact $contact
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFavorite(Contact $contact)
    {
        $user =  auth()->user();
        $user->contacts()->detach($contact);

        return redirect()->back();
    }



}
