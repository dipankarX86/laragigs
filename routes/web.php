<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {
//     ddd($id);
//     return response('Post '.$id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     // dd($request->name.' from '.$request->city);
//     return $request->name.' from '.$request->city;  // now we can use these values for whatever we want
// });
// //  Single Listing
// Route::get('/listings/{id}', function($id) {
//     $listing = Listing::find($id);
//     if($listing) {
//         return view('listing', [
//             'listing' => Listing::find($id)
//         ]);
//     } else {
//         abort('404');
//     }
// });


// All Listings
Route::get('/', [ListingController::class, 'index']);


//  Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
