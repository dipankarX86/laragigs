<?php

namespace App\Models;

class Listing {
    public static function all() {
        return [[
            'id' => 1,
            'title' => 'Listing One',
            'description' => 'Finite Automata(FA) is the simplest machine to recognize patterns. The finite automata or finite state machine is an abstract machine that has five elements or tuples. It has a set of states and rules for moving from one state to another but it depends upon the applied input symbol. Basically, it is an abstract model of a digital computer. The following figure shows some essential features of general automation.',
        ],
        [
            'id' => 2,
            'title' => 'Listing Two',
            'description' => 'Finite Automata(FA) is the simplest machine to recognize patterns. The finite automata or finite state machine is an abstract machine that has five elements or tuples. It has a set of states and rules for moving from one state to another but it depends upon the applied input symbol. Basically, it is an abstract model of a digital computer. The following figure shows some essential features of general automation.',
        ]];
    }

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing) {
            if($listing['id'] == $id) {
                return $listing;
            }
        }
    }

}