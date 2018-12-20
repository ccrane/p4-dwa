<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Winery;
use App\Country;
use App\Region;

class WineryController extends Controller
{
    public function index(Request $request)
    {
        $perPageSize = $request->perPageSize;

        $searchText = $request->searchText;

        if (!$searchText) {
            $wineries = Winery::with(['country', 'region', 'region.region', 'wines'])->orderBy('name')->paginate($perPageSize);
        } else {
            $wineries = Winery::with(['country', 'region', 'region.region', 'wines'])->where('name', 'like', '%' . $searchText . '%')->orderBy('name')->paginate($perPageSize);
        }

        return view('admin.wineries.index', [
            'wineries' => $wineries,
            'perPageSize' => $perPageSize,
            'searchText' => $searchText
        ]);
    }

    public function show(Request $request, $id)
    {
        $winery = Winery::with('wines')->find($id);

        if (!$winery) {
            return redirect('/admin/wineries')->with([
                'alert' => 'Winery with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            return view('admin.wineries.show')->with([
                'winery' => $winery
            ]);
        }
    }

    public function create(Request $request)
    {
        $countries = Country::orderBy('name')->get();
        $regions = Region:: with(['country', 'regions'])->orderBy('name')->get();

        return view('admin.wineries.create')->with([
            'countries' => $countries,
            'regions' => $regions
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'region' => 'required',
        ]);

        # Save new winery
        $winery = new Winery();

        $winery->name = $request->name;
        $winery->country_id = $request->country;
        $winery->region_id = $request->region;

        $winery->save();

        # Redirect back to view all wineries
        return redirect('/admin/wineries')->with([
            'alert' => $winery->name . ' added successfully.',
            'success' => true
        ]);
    }

    public function edit(Request $request, $id)
    {
        $winery = Winery::find($id);

        if (!$winery) {
            return redirect('/admin/wineries')->with([
                'alert' => 'Winery with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            $countries = Country::orderBy('name')->get();
            $regions = Region:: with(['country', 'regions'])->orderBy('name')->get();

            return view('admin.wineries.edit')->with([
                'winery' => $winery,
                'countries' => $countries,
                'regions' => $regions
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $winery = Winery::find($id);

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
            ]);

            # Save winery
            $winery->name = $request->name;
            $winery->country_id = $request->country;
            $winery->region_id = $request->region;

            $winery->save();

            # Redirect back to edit wineries
            return redirect('/admin/wineries/' . $id . '/edit')->with([
                'alert' => $winery->name . ' added successfully.',
                'success' => true
            ]);
        }
    }

    public function delete(Request $request, $id)
    {
        $winery = Winery::find($id);

        if (!$winery) {
            return redirect('/admin/wineries')->with([
                'alert' => 'Winery with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            return view('admin.wineries.delete')->with([
                'winery' => $winery
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $winery = Winery::find($id);

        if ($winery) {
            $winery->delete();

            $alert = $winery->name . ' deleted successfully.';
            $success = true;
        } else {
            $alert = 'Winery with id [' . $id . '] could not be found.';
            $success = false;
        }

        return redirect('/admin/wineries')->with([
            'alert' => $alert,
            'success' => $success
        ]);
    }
}
