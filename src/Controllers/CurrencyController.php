<?php

namespace CER\Currency\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    
    public function index()
    {
//         $response = Http::get('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        $xmldata = simplexml_load_string($response);
        $data = $xmldata;
        return view("cer/currency::exchange",compact("data"));

    }
 
    
    

    
}
