<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserModel extends Model
{
    use Authenticatable;
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
