<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Finite Automata(FA) is the simplest machine to recognize patterns. The finite automata or finite state machine is an abstract machine that has five elements or tuples. It has a set of states and rules for moving from one state to another but it depends upon the applied input symbol. Basically, it is an abstract model of a digital computer. The following figure shows some essential features of general automation.',
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Finite Automata(FA) is the simplest machine to recognize patterns. The finite automata or finite state machine is an abstract machine that has five elements or tuples. It has a set of states and rules for moving from one state to another but it depends upon the applied input symbol. Basically, it is an abstract model of a digital computer. The following figure shows some essential features of general automation.',
            ]
        ]
    ]);
});

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

