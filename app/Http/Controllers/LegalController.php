<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function tandc()
    {
        return view('legal.tandc');
    }

    public function cookies()
    {
        return view('legal.cookie');
    }

    public function privacy()
    {
        return view('legal.privacy');
    }
}
