<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index(Request $request) {
        $countries = Country::orderBy('name')->get();

        return view('admin.countries.index', [
            'countries' => $countries
        ]);
    }

}
