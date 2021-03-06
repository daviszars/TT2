<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    //table name
    protected $table = 'movies';

    //primary key
    public $primaryKey = 'id';

    public function followedBy(User $user){
        return $this->follows->contains('user_id', $user->id);
    }

    // public function user() {
    //     return $this->hasMany('App\User');
    // }

    public function follows(){
        return $this->hasMany(Follow::class);
    }
}
