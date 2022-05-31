<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];
    //// any resource you create you can add this fillable as protected, if you want to be able to submit forms like that

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // here we define a relationship between listings and users, 
    // the way that we do that is by creating a function
    // 
    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // for these relations and other important functions we should look at the eloquent documentation

}
