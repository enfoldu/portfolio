<?php

namespace App\Http\Controllers;

use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    /**
     * Show the application settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.index');
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:255',
            'logo' => '',
            'email' => 'email',
            'phone' => 'min:10',
        ]);

        // Find first row.
        $firstRow = DB::table('systems')->first();

        if(is_null($firstRow)) $firstRow = collect(['id' => 0]);

        dd($firstRow);

        // If there's an id from the $firstRow, set all data to the $request.
        // If no matching model exists, create one.
        $systemUpdate = System::updateOrCreate(['id' => $firstRow->id], $request->all());

        return ($systemUpdate)
            ? response()->json(['created' => true], 200)
            : response()->json(['created' => false], 400);

    }
}
