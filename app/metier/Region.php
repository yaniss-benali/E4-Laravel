<?php

namespace App\metier;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Region extends Model
{
    // DECLARATION TABLE REGION //
    protected $table = 'region';
    public $timestamps = false;
    protected $fillable =
    [
        'id_region',
        'id_secteur',
        'code_region',
        'nom_region'
    ];
}
