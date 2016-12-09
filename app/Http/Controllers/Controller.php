<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Check if resource has data (exists).
     *
     * @param $resource
     * @return boolean
     */
    public function exists($resource) {
        if (is_null($resource)) return false;

        return true;
    }

    /**
     * Update the database from a form request.
     *
     * @param $resource
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateFromForm ($resource, $request) {

        // Update resource (database) from request (from).
        foreach ($resource->toArray() as $key => $value) {
            if ($request->has($key)) $resource->$key = $request->$key;
        }

        // Save.
        $resource->save();
    }

    /**
     * Allows for pagination with a custom collection.
     *
     * @param $collection
     * @param $perPage
     * @return mixed
     */
    public function customPagination($collection, $perPage)
    {
        $request = Request::capture();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $items = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $result = new LengthAwarePaginator($items, count($collection), $perPage, $currentPage);

        $result =  $result->setPath($request->url());

        return $result->appends($request->except(['page']));
    }
}
