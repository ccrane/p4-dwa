<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Winery;
use App\Wine;
use App\Review;

class IndexController extends Controller
{
    public function admin_index(Request $request) {

        return view('admin.index')->with([
            'users' => User::all()->count(),
            'wineries' => Winery::all()->count(),
            'wines' => Wine::all()->count(),
            'reviews' => Review::all()->count()
        ]);
    }

    public function guest_index(Request $request) {

        $wines = Wine::orderBy('name')->paginate(15);

        return view('index')->with([
            'wines' => $wines
        ]);
    }
}
