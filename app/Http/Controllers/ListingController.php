<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    // public function index(Request $request) {
    public function index() {
        // dd($request);
        // dd(request()->tag);  // because request is a helper function which work the same way as dd
                        //you can either user the dependency injection or the helper function, the end result is the same
        return view('listings.index', [
            // 'listings' => Listing::all()
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }
    
    // Show single listing
    public function show(Listing $listing) {  //type conversion from id to object
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    
    // show create form
    public function create() {
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request) {
        // dd($request->all());
        // validation
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);

        return redirect('/');
    }
    
}
