<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Show the application roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Insert custom key named content with json as value.
        $collection = Role::all()->each(function ($item, $key) {
            return $item->content = $item->toJson();
        });

        // Create custom pagination.
        $result = $this->customPagination($collection, 15);

        return view('roles.index', ['roles' => $result]);
    }

    /**
     * Update the application role.
     *
     * @return \Illuminate\Http\Response
     */
    public function patch(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' => 'required|max:255',
            'short_name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        // Check if role exists.
        if (!$this->exists($role = Role::find($id))) {
            return response()->json(['patch' => false], 404);
        }

        // Update role.
        $this->updateFromForm($role, $request);

        return response()->json(['patched' => true]);
    }

    /**
     * Delete the application role.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Check if role exists.
        if (!$this->exists($role = Role::find($id))) {
            return response()->json(['deleted' => false], 404);
        }

        // Delete role.
        $role->delete();

        return response()->json(['deleted' => true]);
    }
}
