<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get users with their roles.
        $users = User::with('roles')->get();

        // Insert custom key named content with json as value.
        $collection = $users->each(function ($item, $key) {
            return $item->content = $item->toJson();
        });

        // Create custom pagination.
        $result = $this->customPagination($collection, 15);

        return view('users.index', ['users' => $result, 'roles' => Role::all()]);
    }

    /**
     * Update the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|alpha|max:255',
            'last_name' => 'required|alpha|max:255',
            'email' => 'required|email',
        ]);

        // Check if user exists.
        if (!$this->exists($user = User::find($id))) {
            return response()->json(['patch' => false], 404);
        }

        // Update user.
        $this->updateFromForm($user, $request);

        // Get roles.
        $newRoles = Role::whereIn('short_name', json_decode($request->options))->get();

        // Detach all connected roles.
        $user->roles()->detach();

        // Attach new roles.
        $user->roles()->sync($newRoles);

        return response()->json(['patched' => true]);
    }

    /**
     * Delete the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Check if user exists.
        if (!$this->exists($user = User::find($id))) {
            return response()->json(['deleted' => false], 404);
        }

        // Delete role.
        $user->delete();

        return response()->json(['deleted' => true]);
    }
}
