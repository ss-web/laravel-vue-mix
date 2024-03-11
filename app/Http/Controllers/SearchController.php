<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();

        $name = $request->input('name');
        if ($name) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($name) . '%']);
        }

        $query->bedrooms($request->input('bedrooms'))
            ->where('bathrooms', $request->input('bathrooms'))
            ->where('storeys', $request->input('storeys'))
            ->where('garages', $request->input('garages'))
            ->whereBetween('price', [$request->input('priceMin'), $request->input('priceMax')]);

        $results = $query->get();

        return response()->json(['results' => $results->toArray()]);
    }
}