<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetionModel extends Model
{
    use HasFactory;
    protected $table = 'tekmovanja2';
    public $timestamps = false;
    protected $fillable=[
        'ime_tekmovanja',
        'opis_tekmovanja',
        'kategorija_id',
        'ustvarjalec_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'ustvarjalec_id');
    }

}
