<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'uporabniki';
    protected $fillable = [
        'fullname',
        'vzdevek',
        'email',
        'geslo',

    ];
}
