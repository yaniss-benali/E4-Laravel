<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier;
use Exception;

class TravaillerController extends Controller
{
    // RENVOIE A L'ACCUEIL //
    public function home()
    {
        return view('home');
    }
}
