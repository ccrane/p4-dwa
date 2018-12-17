<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $perPageSize = $request->perPageSize;

        $searchText = $request->searchText;

        if (!$searchText) {
            $countries = Country::orderBy('name')->paginate($perPageSize);
        } else {
            $countries = Country::where('name', 'like', '%' . $searchText . '%')->orWhere('iso_code', 'like', '%' . $searchText . '%')->orderBy('name')->paginate($perPageSize);
        }

        return view('admin.countries.index', [
            'countries' => $countries,
            'perPageSize' => $perPageSize,
            'searchText' => $searchText
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.countries.create')->with([
            'alert' => session('alert', ''),
            'success' => session('success', null)
        ]);
    }

    public function store(Request $request)
    {
        # Only calculate converted amount if form is submitted and valid.
        $request->validate([
            'name' => 'required',
            'iso_code' => 'required'
        ]);

        $exists = Country::where('iso_code', '=', $request->iso_code)->exists();
        if (!$exists) {
            # Save new country
            $country = new Country();
            $country->name = $request->name;
            $country->iso_code = $request->iso_code;
            $country->save();

            $alert = $country->name . ' added successfully.';
            $success = true;
        } else {
            $alert = 'ISO Code ' . $request->iso_code . ' already exists.';
            $success = false;
        }

        # Redirect back to add
        return redirect('/admin/countries/create')->with([
            'alert' => $alert,
            'success' => $success
        ]);
    }

    public function edit(Request $request, $id)
    {
        $country = Country::find($id);

        if (!$country) {
            return redirect('/admin/countries')->with([
                'alert' => 'Country with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            return view('admin.countries.edit')->with([
                'country' => $country
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        # Only calculate converted amount if form is submitted and valid.
        $request->validate([
            'name' => 'required',
            'iso_code' => 'required'
        ]);

        $country = Country::find($id);

        if ($country) {
            # Check iso_code is not already used
            $exists = Country::where([['id', '!=', $id], ['iso_code', '=', $request->iso_code]])->exists();

            if (!$exists) {
                # Save country
                $country->name = $request->name;
                $country->iso_code = $request->iso_code;
                $country->save();

                $alert = 'Updated successfully.';
                $success = true;
            } else {
                $alert = 'ISO Code ' . $request->iso_code . ' already exists.';
                $success = false;
            }

            return redirect('/admin/countries/' . $country->id . '/edit')->with([
                'alert' => $alert,
                'success' => $success
            ]);
        } else {
            return redirect('/admin/countries')->with([
                'alert' => 'Country with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        }
    }

    public function delete(Request $request, $id)
    {
        $country = Country::find($id);

        if (!$country) {
            return redirect('/admin/countries')->with([
                'alert' => 'Country with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            return view('admin.countries.delete')->with([
                'country' => $country
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $country = Country::find($id);

        if ($country) {
            $country->delete();

            $alert = $country->name . ' deleted successfully.';
            $success = true;
        } else {
            $alert = 'Country with id [' . $id . '] could not be found.';
            $success = false;
        }

        return redirect('/admin/countries')->with([
            'alert' => $alert,
            'success' => $success
        ]);
    }
}
