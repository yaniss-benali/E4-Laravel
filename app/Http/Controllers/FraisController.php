<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\Frais;
use Exception;

class FraisController extends Controller
{
    public function getFraisVisiteur()
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $unFrais = new Frais();
        $id_visiteur = Session::get('id');
        
        $mesFrais = $unFrais->getFrais($id_visiteur);
        
        return view('listeFrais', compact('mesFrais', 'erreur'));
    }
    
    public function getFrais($id_visiteur)
    {
        $lesFrais = DB::table('frais')
                ->Select()
                ->where('frais.id_visiteur', '=', $id_visiteur)
                ->get();
        return $lesFrais;
    }
    
    public function updateFrais($id_frais)
    {
        $erreur = "";
        $unFrais = new Frais();
        $unFrais = $unFrais->getById($id_frais);
        $titreVue = "Modification d'une fiche de frais";
        // Affiche le formulaire en lui fournissant les données à afficher //
        return view('formFrais',compact('unFrais','titreVue','erreur'));
    }
    public function validateFrais()
    {
        $id_frais = Request::input('id_frais');
        $anneemois = Request::input('anneemois');
        $nbjustificatifs = Request::input('nbjustificatifs');
        $unFrais = new Frais();
        if ($id_frais > 0)
        {
            $unFrais->updateFrais($id_frais, $anneemois, $nbjustificatifs);
        }
        else
        {
            $id_visiteur = Session::get('id');
            $unFrais->InsertFrais($anneemois,$nbjustificatifs,$id_visiteur);
        }
        $unFrais->updateFrais($id_frais, $anneemois, $nbjustificatifs);
        return redirect('/getListeFrais');
    }
    public function addFrais()
    {
        $erreur = "";
        $unFrais = new Frais();
        $titreVue = "Ajout d'une fiche de Frais";
        // Afficher formulaire en lui fournissant les données à afficher //
        return view('formFrais',compact('unFrais','titreVue','erreur'));
    }
    public function supprimeFrais($id_frais)
    {
        $unFrais = new Frais();
        try 
        {
            $unFrais->deleteFrais($id_frais);  
        } 
        catch (Exception $ex)
        {
            Session::put('erreur', $ex->getMessage());
        }
        finally
        {
            return redirect('/getListeFrais');
        }
    }
}
