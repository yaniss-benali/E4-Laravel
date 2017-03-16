<?php

namespace App\Http\Controllers;

use Request;
use App\metier\Visiteur;
//use Illuminate\Database\Query\Builder;

class UtilisateurController extends Controller
{
    // Initialisation formulaire connexion //
    public function getLogin()
    {
        $erreur = "";
        return view('formLogin', compact('erreur'));
    }
    
    // Authentification visiteur authentifié //
    public function signOut()
    {
        $unVisiteur = new Visiteur();
        $unVisiteur->logout();
        return view('home');
    }
    public function signIn()
    {
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $unVisiteur = new Visiteur();
        $connected = $unVisiteur->Login($login,$pwd);
        if($connected)
        {
            return view('home');
        }
        else
        {
            $erreur = "Login ou mot de passe inconnt !";
            return view('formLogin',compact('erreur'));
        }
    }
}
