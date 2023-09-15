<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function set_locale($locale) {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->route('index');
    }

    public function set_currency($currency) {
        session()->put('currency', $currency);
        return redirect()->route('index');
    }
    
}
