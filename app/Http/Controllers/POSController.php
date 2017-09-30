<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class POSController extends Controller
{
    // index
    public function index()
    {
        return view('POSs.index');
    }
}
