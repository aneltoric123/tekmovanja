<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{public $timestamps = false;
    use HasFactory;
    protected $table = 'kategorije';
    protected $fillable = [
        'ime_kategorije',
    ];
}
