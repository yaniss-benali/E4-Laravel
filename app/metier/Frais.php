<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class Frais extends Model
{
    // Déclaration table Frais //
    protected $table = 'frais';
    public $timestamps = false;
    private $id_frais;
    protected $fillable =
    [
        'id_frais',
        'id_etat',
        'anneemois',
        'id_visiteur',
        'nbjustificatifs',
        'datemodification',
        'montant_valide'
    ];
    
    public function __construct() 
    {
        $this->id_frais = 0;
    }

    
    public function getFrais($id_visiteur)
    {
        $lesFrais = DB::table('frais')
                ->Select()
                ->where('frais.id_visiteur', '=', $id_visiteur)
                ->get();
        return $lesFrais;
    }
    

    public function updateFrais($id_frais, $anneemois, $nbjustificatifs)
    {
        $dateJour = date("Y-m-d");
        DB::table('frais')->where('id_frais', '=', $id_frais)->update(['anneemois' => $anneemois, 'nbjustificatifs' => $nbjustificatifs, 'datemodification' => $dateJour]);
    }
    public function getById($id_frais)
    {
        $unFrais = DB::table('frais')
                ->Select()
                ->where('frais.id_frais','=',$id_frais)
                ->first();
        return $unFrais;
    }
    public function InsertFrais($anneemois,$nbjustificatifs,$id_visiteur)
    {
        $dateJour = date("Y-m-d");
        $id_etat = 1;
        $id_visiteur = Session::get('id');
        DB::table('frais')->insert(['id_etat' => $id_etat,'anneemois' => $anneemois,'id_visiteur' => $id_visiteur , 'nbjustificatifs' => $nbjustificatifs, 'datemodification' => $dateJour]);
    }
    public function deleteFrais($id_frais)
    {
        DB::table('frais')->where('id_frais','=',$id_frais)->delete();
    }
}
