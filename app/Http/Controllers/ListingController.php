<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    // Show all listings
    // public function index(Request $request) {
    public function index() {
        // dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(2));
        // dd($request);
        // dd(request()->tag);  // because request is a helper function which work the same way as dd
                        //you can either user the dependency injection or the helper function, the end result is the same
        return view('listings.index', [
            // 'listings' => Listing::all()
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(2)
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    

    //
    // Show single listing
    public function show(Listing $listing) {  //type conversion from id to object
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    

    //
    // show create form
    public function create() {
        return view('listings.create');
    }


    //
    // Store listing data
    public function store(Request $request) {
        // dd($request->file('logo')->store());
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

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');  
            // this does two work at same time, stores the image in file and stores the link ib the database
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing Created Successfully');
    }


    //
    // show edit form
    public function edit(Listing $listing) {
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }


    //
    // Update Listing
    public function update(Request $request, Listing $listing) {

        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',  // some doubt here
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing Updated Successfully');
    }


    //
    // Delete Listing
    public function destroy(Listing $listing) {
        
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }


    // manage listing
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

    
}
