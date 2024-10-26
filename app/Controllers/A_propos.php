<?php

namespace App\Controllers;



class A_propos extends BaseController{
    public function index() :string
    {
        return view('A_propos');
    }
}