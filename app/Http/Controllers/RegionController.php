<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Region;

class RegionController extends Controller
{
    public function create(Request $request, $cid, $rid = null)
    {
        $country = Country::find($cid);

        if (!$country) {
            return redirect('/admin/countries')->with([
                'alert' => 'Country with id [' . $cid . '] could not be found.',
                'success' => false
            ]);
        } else {
            $region = null;
            if ($rid != null) {
                $region = Region::find($rid);

                if (!$region) {
                    return redirect('/admin/countries/' . $country->id . '/regions')->with([
                        'alert' => 'Region with id [' . $rid . '] could not be found.',
                        'success' => false
                    ]);
                }
            }

            return view('admin.regions.create')->with([
                'country' => $country,
                'region' => $region
            ]);
        }
    }

    public function store(Request $request, $cid, $rid = null)
    {
        $country = Country::find($cid);

        if (!$country) {
            return redirect('/admin/countries')->with([
                'alert' => 'Country with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            $request->validate([
                'name' => 'required'
            ]);

            $region = null;
            if ($rid != null) {
                $region = Region::find($rid);

                if (!$region) {
                    return redirect('/admin/countries/' . $country->id . '/regions')->with([
                        'alert' => 'Region with id [' . $rid . '] could not be found.',
                        'success' => false
                    ]);
                }
            }

            $subregion = new Region();
            $subregion->name = $request->name;
            $subregion->country_id = $country->id;
            if ($region != null) {
                $subregion->parent_id = $region->id;
            }

            $subregion->save();

            return redirect('/admin/countries/' . $country->id . '/regions/' . ($region != null ? $region->id . '/' : '') . 'create')->with([
                'alert' => 'Region added successfully.',
                'success' => true
            ]);
        }
    }

    public function delete(Request $request, $cid, $rid)
    {
        $country = Country::find($cid);

        if (!$country) {
            return redirect('/admin/countries')->with([
                'alert' => 'Country with id [' . $cid . '] could not be found.',
                'success' => false
            ]);
        } else {
            $region = Region::find($rid);

            if (!$region) {
                return redirect('/admin/countries/' . $country->id . '/regions')->with([
                    'alert' => 'Region with id [' . $rid . '] could not be found.',
                    'success' => false
                ]);
            }

            return view('admin.regions.delete')->with([
                'country' => $country,
                'region' => $region
            ]);
        }
    }

    public function destroy(Request $request, $cid, $rid)
    {
        $region = Region::find($rid);

        if ($region) {
            $region->delete();

            $alert = $region->name . ' deleted successfully.';
            $success = true;
        } else {
            $alert = 'Region with id [' . $rid . '] could not be found.';
            $success = false;
        }

        return redirect('/admin/countries/' . $cid . '/regions')->with([
            'alert' => $alert,
            'success' => $success
        ]);
    }

    public function edit(Request $request, $cid, $rid)
    {
        $country = Country::find($cid);

        if (!$country) {
            return redirect('/admin/countries')->with([
                'alert' => 'Country with id [' . $cid . '] could not be found.',
                'success' => false
            ]);
        } else {
            $region = Region::find($rid);

            if (!$region) {
                return redirect('/admin/countries/' . $country->id . '/regions')->with([
                    'alert' => 'Region with id [' . $rid . '] could not be found.',
                    'success' => false
                ]);
            }

            return view('admin.regions.edit')->with([
                'country' => $country,
                'region' => $region
            ]);
        }
    }

    public function update(Request $request, $cid, $rid)
    {
        $country = Country::find($cid);

        if (!$country) {
            return redirect('/admin/countries')->with([
                'alert' => 'Country with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            $request->validate([
                'name' => 'required'
            ]);

            $region = Region::find($rid);

            if (!$region) {
                return redirect('/admin/countries/' . $country->id . '/regions')->with([
                    'alert' => 'Region with id [' . $rid . '] could not be found.',
                    'success' => false
                ]);
            }

            $region->name = $request->name;
            $region->save();

            return redirect('/admin/countries/' . $country->id . '/regions')->with([
                'alert' => $region->name . ' updated successfully.',
                'success' => true
            ]);
        }
    }
}
