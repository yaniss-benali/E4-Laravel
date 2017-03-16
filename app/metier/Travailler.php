<?php

namespace App\metier;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Travailler extends Model
{
    // DECLARATION TABLE TRAVAILLER //
    protected $table = 'travailler';
    public $timestamps = false;
    protected $fillable =
    [
        'id_visiteur',
        'jjmmaa',
        'id_region',
        'role_visiteur'
    ];
}
