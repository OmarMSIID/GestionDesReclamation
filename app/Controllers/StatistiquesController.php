<?php

namespace App\Controllers;

use App\Models\ReclamationModel;

class StatistiquesController extends BaseController{
    public function index()
    {
        $model=new ReclamationModel();
        $accepte=$model->counteAcceptedState();
        $refuse=$model->counteRefuseState();
        $enCourDeTraitement=$model->counteEnCourDeTraitemetState();
        $total=$model->countAllResults();
        $data=[
            'enCourDeTraitement'=>$enCourDeTraitement,
            'accepte'=>$accepte,
            'refuse'=>$refuse,
            'recus'=>$total
        ];
        /*
            TODO:ajouter les donnes dans le view.
        */
        return view('Statistiques',$data);
    }
}