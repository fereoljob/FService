<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControleurAdmin extends Controller
{
    function Admin()
    {
        return view('Administration/Admin');
    }
}
