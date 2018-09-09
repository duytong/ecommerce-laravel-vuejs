<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Search through Algolia API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $modelString
     * @param  int  $perPage
     * @return object
     */
    public function search(Request $request, $modelString)
    {
        if (substr($modelString, -3)  == 'ies') {
            $model = '\App\\' . ucfirst(substr($modelString, 0, -3)) . 'y';
        } else {
            $model = '\App\\' . ucfirst(substr($modelString, 0, -1));
        }

        return $model::search($request->q)->paginate($request->perPage);
    }
}
