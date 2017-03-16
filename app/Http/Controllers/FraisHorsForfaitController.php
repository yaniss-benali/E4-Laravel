<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\Frais;
use App\metier\FraisHorsForfait;
use Exception;

class FraisHorsForfaitController extends Controller
{
    public function getFraisHorsForfaitFrais($id)
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $unFraisHorsForfait = new FraisHorsForfait();
        $id_frais = $id;
        
        $mesFraisHorsForfait = $unFraisHorsForfait->getFraisHorsForfait($id_frais);
        
        return view('listeFraisHorsForfait', compact('mesFraisHorsForfait', 'erreur', 'id_frais'));
    }
    
    public function getFraisHorsForfait($id_frais)
    {
        return redirect('/formFraisHorsForfait/'.$id_frais);
    }
    
    public function updateFraisHorsForfait($id_fraishorsforfait)
    {
        $erreur = "";
        $unFraisHorsForfait = new FraisHorsForfait();
        $unFraisHorsForfait = $unFraisHorsForfait->getById($id_fraishorsforfait);
        $titreVue = "Modification d'une fiche de frais hors forfait";
        // Affiche le formulaire en lui fournissant les données à afficher //
        return view('formFraisHorsForfait',compact('unFraisHorsForfait','titreVue','erreur'));
    }
    public function validateFraisHorsForfait()
    {
        $id_fraishorsforfait = Request::input('id_fraishorsforfait');
        $id_frais = Request::input('id_frais');
        $date_fraishorsforfait = Request::input('date_fraishorsforfait');
        $montant_fraishorsforfait = Request::input('montant_fraishorsforfait');
        $lib_fraishorsforfait = Request::input('lib_fraishorsforfait');
        $unFraisHorsForfait = new FraisHorsForfait();
        if ($id_fraishorsforfait > 0)
        {
            $unFraisHorsForfait->updateFraisHorsForfait($id_fraishorsforfait,$id_frais,$montant_fraishorsforfait,$lib_fraishorsforfait);
        }
        else
        {
            $id_frais = Request::input('id_frais');
            $unFraisHorsForfait->InsertFraisHorsForfait($id_fraishorsforfait,$id_frais,$montant_fraishorsforfait,$lib_fraishorsforfait);
        }
        $unFraisHorsForfait->updateFraisHorsForfait($id_fraishorsforfait,$id_frais,$montant_fraishorsforfait,$lib_fraishorsforfait);
        return redirect('/getListeFraisHorsForfait/'.$id_frais);
    }
    public function addFraisHorsForfait($id_frais)
    {
        $erreur = "";
        $unFraisHorsForfait = new FraisHorsForfait();
        $titreVue = "Ajout d'une fiche de Frais Hors Forfait";
        // Afficher formulaire en lui fournissant les données à afficher //
        return view('formFraisHorsForfait',compact('unFraisHorsForfait','titreVue','erreur','id_frais'));
    }
    public function supprimeFraisHorsForfait($id_fraishorsforfait)
    {
        $unFraisHorsForfait = new FraisHorsForfait();
        try 
        {
            $unFraisHorsForfait->deleteFraisHorsForfait($id_fraishorsforfait);  
        } 
        catch (Exception $ex)
        {
            Session::put('erreur', $ex->getMessage());
        }
        finally
        {
            return redirect('/');
        }
    }
}
