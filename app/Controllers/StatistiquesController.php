<?php

namespace App\Controllers;

use App\Models\ReclamationModel;
use App\Models\RefusedClaimModel;

class StatistiquesController extends BaseController{
    public function index()
    {
        $refuseModel=new RefusedClaimModel();
        $model=new ReclamationModel();
        $accepte=$model->counteAcceptedState();
        $refuse=$refuseModel->countRefuseClaim();
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