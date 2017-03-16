<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class FraisHorsForfait extends Model
{
    // Déclaration table Frais //
    protected $table = 'fraishorsforfait';
    public $timestamps = false;
    private $id_frais;
    protected $fillable =
    [
        'id_fraishorsforfait',
        'id_frais',
        'date_fraishorsforfait',
        'montant_fraishorsforfait',
        'lib_fraishorsforfait',
    ];
    
    public function __construct() 
    {
        $this->id_fraishorsforfait = 0;
    }

    
    public function getFraisHorsForfait($id_frais)
    {
        $lesFraisHorsForfait = DB::table('fraishorsforfait')
                ->Select()
                ->where('fraishorsforfait.id_frais', '=', $id_frais)
                ->get();
        return $lesFraisHorsForfait;
    }
    
    public function updateFraisHorsForfait($id_fraishorsforfait,$id_frais,$montant_fraishorsforfait,$lib_fraishorsforfait)
    {
        $date_fraishorsforfait = date("Y-m-d");
        DB::table('fraishorsforfait')->where('id_fraishorsforfait', '=', $id_fraishorsforfait)->update(['id_fraishorsforfait' => $id_fraishorsforfait, 'id_frais' => $id_frais, 'date_fraishorsforfait' => $date_fraishorsforfait, 'montant_fraishorsforfait' => $montant_fraishorsforfait, 'lib_fraishorsforfait' => $lib_fraishorsforfait]);
    }
    public function getById($id_fraishorsforfait)
    {
        $unFraisHorsForfait = DB::table('fraishorsforfait')
                ->Select()
                ->where('fraishorsforfait.id_fraishorsforfait','=',$id_fraishorsforfait)
                ->first();
        return $unFraisHorsForfait;
    }
    public function InsertFraisHorsForfait($id_fraishorsforfait,$id_frais,$montant_fraishorsforfait,$lib_fraishorsforfait)
    {
        $date_fraishorsforfait = date("Y-m-d");
        DB::table('fraishorsforfait')->insert(['id_frais' => $id_frais, 'date_fraishorsforfait' => $date_fraishorsforfait, 'montant_fraishorsforfait' => $montant_fraishorsforfait, 'lib_fraishorsforfait' => $lib_fraishorsforfait]);
    }
    public function deleteFraisHorsForfait($id_fraishorsforfait)
    {
        DB::table('fraishorsforfait')->where('id_fraishorsforfait','=',$id_fraishorsforfait)->delete();
    }
}
