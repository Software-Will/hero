<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//No usar resource porque ya no se basara en un modelo
class BSController extends Controller
{

    public function index()
    {
        return view('admin.bs.index'); //vista de batallas
    }
}
