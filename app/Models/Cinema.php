<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    //table name
    protected $table = 'cinemas';

    //primary key
    public $primaryKey = 'id';
}
