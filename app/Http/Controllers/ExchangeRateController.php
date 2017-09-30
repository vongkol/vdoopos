<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class ExchangeRateController extends Controller
{
    // index
    public function index()
    {
        $data['exchangerates'] = DB::table('exchangerates')
            ->orderBy('modify_at','desc')
            ->first();
        return view('exchangerates.index', $data);
    }
 
}
