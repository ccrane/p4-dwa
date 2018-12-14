<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index(Request $request) {
        $perPageSize = $request->perPageSize;

        $countries = Country::orderBy('name')->paginate($perPageSize);

        return view('admin.countries.index', [
            'countries' => $countries,
            'perPageSize' => $perPageSize
        ]);
    }

}
