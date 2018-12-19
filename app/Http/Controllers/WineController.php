<?php

namespace App\Http\Controllers;

use App\Country;
use App\GrapeVariety;
use App\Region;
use App\WineType;
use Illuminate\Http\Request;
use App\Winery;
use App\Wine;

class WineController extends Controller
{
    public function create(Request $request, $id)
    {
        $winery = Winery::with(['country', 'region'])->find($id);

        if (!$winery) {
            return redirect('/admin/wineries')->with([
                'alert' => 'Winery with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            $countries = Country::orderBy('name')->get();
            $regions = Region:: with(['country', 'regions'])->orderBy('name')->get();
            $types = WineType::orderBy('name')->get();
            $varieties = GrapeVariety::orderBy('name')->get();

            return view('admin.wines.create')->with([
                'winery' => $winery,
                'countries' => $countries,
                'regions' => $regions,
                'winetypes' => $types,
                'varieties' => $varieties
            ]);
        }
    }

    public function store(Request $request, $id)
    {
        $winery = Winery::with(['country', 'region'])->find($id);

        if (!$winery) {
            return redirect('/admin/wineries')->with([
                'alert' => 'Winery with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'country' => 'required',
                'region' => 'required',
                'type' => 'required',
                'variety' => 'required',
                'vintage' => 'required|digits:4',
                'price' => 'required|regex:/^\d{1,9}(\.\d{1,2})?$/',
                'bottleImageUrl' => 'required|url'
            ]);

            # Save new wine
            $wine = new Wine();

            $wine->name = $request->name;
            $wine->winery_id = $id;
            $wine->country_id = $request->country;
            $wine->region_id = $request->region;
            $wine->type_id = $request->type;
            $wine->variety_id = $request->variety;
            $wine->vintage = $request->vintage;
            $wine->price = $request->price;
            $wine->bottle_image_url = $request->bottleImageUrl;
            $wine->description = $request->description;

            $wine->save();

            # Redirect back to add
            return redirect('/admin/wineries/' . $id)->with([
                'alert' => $wine->name . ' added successfully.',
                'success' => true
            ]);
        }
    }

    public function edit(Request $request, $id, $wid)
    {
        $winery = Winery::with(['country', 'region'])->find($id);

        if (!$winery) {
            return redirect('/admin/wineries')->with([
                'alert' => 'Winery with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            $wine = Wine::with(['country', 'region', 'type', 'variety'])->find($wid);

            if (!$wine) {
                return redirect('/admin/wineries/' . $id)->with([
                    'alert' => 'Wine with id [' . $id . '] could not be found.',
                    'success' => false
                ]);
            }

            $countries = Country::orderBy('name')->get();
            $regions = Region:: with(['country', 'regions'])->orderBy('name')->get();
            $types = WineType::orderBy('name')->get();
            $varieties = GrapeVariety::orderBy('name')->get();

            return view('admin.wines.edit')->with([
                'wine' => $wine,
                'winery' => $winery,
                'countries' => $countries,
                'regions' => $regions,
                'winetypes' => $types,
                'varieties' => $varieties
            ]);
        }
    }

    public function update(Request $request, $id, $wid)
    {
        $winery = Winery::with(['country', 'region'])->find($id);

        if (!$winery) {
            return redirect('/admin/wineries')->with([
                'alert' => 'Winery with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            $wine = Wine::with(['country', 'region', 'type', 'variety'])->find($wid);

            if (!$wine) {
                return redirect('/admin/wineries/' . $id)->with([
                    'alert' => 'Wine with id [' . $id . '] could not be found.',
                    'success' => false
                ]);
            }

            $request->validate([
                'name' => 'required',
                'country' => 'required',
                'region' => 'required',
                'type' => 'required',
                'variety' => 'required',
                'vintage' => 'required|digits:4',
                'price' => 'required|regex:/^\d{1,9}(\.\d{1,2})?$/',
                'bottleImageUrl' => 'required|url'
            ]);

            # Save wine updates
            $wine->name = $request->name;
            $wine->winery_id = $id;
            $wine->country_id = $request->country;
            $wine->region_id = $request->region;
            $wine->type_id = $request->type;
            $wine->variety_id = $request->variety;
            $wine->vintage = $request->vintage;
            $wine->price = $request->price;
            $wine->bottle_image_url = $request->bottleImageUrl;
            $wine->description = $request->description;

            $wine->save();

            # Redirect back to edit
            return redirect('/admin/wineries/' . $id . '/wines/' . $wid . '/edit')->with([
                'alert' => 'Updated successfully.',
                'success' => true
            ]);
        }
    }

    public function delete(Request $request, $id, $wid)
    {
        $winery = Winery::find($id);

        if (!$winery) {
            return redirect('/admin/wineries')->with([
                'alert' => 'Winery with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            $wine = Wine::with(['country', 'region', 'type', 'variety'])->find($wid);

            if (!$wine) {
                return redirect('/admin/wineries/' . $id)->with([
                    'alert' => 'Wine with id [' . $id . '] could not be found.',
                    'success' => false
                ]);
            }

            return view('admin.wines.delete')->with([
                'wine' => $wine,
            ]);
        }
    }

    public function destroy(Request $request, $id, $wid)
    {
        $wine = Wine::find($wid);

        if ($wine) {
            $wine->delete();

            $alert = $wine->name . ' deleted successfully.';
            $success = true;
        } else {
            $alert = 'Wine with id [' . $wid . '] could not be found.';
            $success = false;
        }

        return redirect('/admin/wineries/' . $id)->with([
            'alert' => $alert,
            'success' => $success
        ]);
    }
}
