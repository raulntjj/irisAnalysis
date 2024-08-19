<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iris extends Model{
    use HasFactory;

    protected $table = 'iris';

    protected $fillable = [
        'sepal_length', 
        'sepal_width', 
        'petal_length', 
        'petal_width', 
        'species'
    ];
}
