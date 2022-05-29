<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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
            'listings' => Listing::latest()->filter(request(['tag']))->get()
        ]);
    }
    
    // Show single listing
    public function show(Listing $listing) {  //type conversion from id to object
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    
}
