<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPageSize = $request->perPageSize;

        $searchText = $request->searchText;

        if (!$searchText) {
            $users = User::orderBy('name')->paginate($perPageSize);
        } else {
            $users = User::where('name', 'like', '%' . $searchText . '%')->orderBy('name')->paginate($perPageSize);
        }

        return view('admin.users.index', [
            'users' => $users,
            'perPageSize' => $perPageSize,
            'searchText' => $searchText
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.users.create')->with([
            'alert' => session('alert', ''),
            'success' => session('success', null)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,standard'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect('/admin/users/create')->with([
            'alert' => 'User created successfully.',
            'success' => true
        ]);
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/admin/users')->with([
                'alert' => 'User with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            return view('admin.users.delete')->with([
                'user' => $user
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            $alert = $user->name . ' deleted successfully.';
            $success = true;
        } else {
            $alert = 'User with id [' . $id . '] could not be found.';
            $success = false;
        }

        return redirect('/admin/users')->with([
            'alert' => $alert,
            'success' => $success
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/admin/users')->with([
                'alert' => 'User with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            return view('admin.users.edit')->with([
                'user' => $user
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/admin/users')->with([
                'alert' => 'User with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        }

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,standard'
        ]);

        # Save user updates
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect('/admin/users/' . $user->id . '/edit')->with([
            'alert' => 'Updated successfully.',
            'success' => true
        ]);
    }

    public function show(Request $request, $id)
    {
        $user = User::with(['reviews'])->find($id);

        if (!$user) {
            return redirect('/admin/wineries')->with([
                'alert' => 'User with id [' . $id . '] could not be found.',
                'success' => false
            ]);
        } else {
            return view('admin.users.show')->with([
                'user' => $user,
            ]);
        }
    }
}
