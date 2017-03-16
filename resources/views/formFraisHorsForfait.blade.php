@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'validerFraisHorsForfait/'],$unFraisHorsForfait->id_frais) !!}  
<div class="col-md-12 col-sm-12 well well-md  well-sm">
    <center><h1> </h1></center>
    <div class="form-horizontal">  
        <input type="hidden" name="id_fraishorsforfait" value="{{$unFraisHorsForfait->id_fraishorsforfait or 0}}"/>
        <input type="hidden" name="id_frais" value="{{$unFraisHorsForfait->id_frais or $id_frais}}"/>
        <div class="form-group">
            <label class="col-md-3 col-sm-3 control-label">Action : </label>
            <div class="col-md-6 col-sm-3">
                <input type="text" name="lib_fraishorsforfait" value="{{$unFraisHorsForfait->lib_fraishorsforfait or 0}}" class="form-control" placeholder="Action réalisée" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 col-sm-3 control-label">Date : </label>
            <div class="col-md-2 col-sm-2">
                <input type="date" name="date_fraishorsforfait" value="{{$unFraisHorsForfait->date_fraishorsforfait or 0}}"  class="form-control" placeholder="Date frais hors forfait" required>
            </div>
        </div>           
        <div class="form-group">
            <label class="col-md-3 col-sm-3 control-label">Montant : </label>
            <div class="col-md-2 col-sm-2">
                <input type="currency" class="form-control"  name="montant_fraishorsforfait" value="{{$unFraisHorsForfait->montant_fraishorsforfait or 0}}" placeholder="Montant engagé" required>
            </div>
        </div>    
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" 
                        onclick="javascript: window.location = '';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler</button>
            </div>           
        </div>
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            
        </div>
    </div>
</div>
