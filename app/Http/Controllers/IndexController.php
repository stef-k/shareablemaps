<?php

namespace App\Http\Controllers;

use App\Map;
use App\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // $maps = Map::with('tags')->get();

        return view('index');
    }

    public function getNames()
    {
        $tags = Tag::pluck('name')->toArray();
        $maps = Map::pluck('name')->toArray();

        return \response()->json(collect($tags, $maps));
    }

    public function getNamesFiltered(Request $request)
    {
        $term = \Str::title($request->query('term'));
        $tags = Tag::where('name', 'LIKE', $term.'%')->pluck('name')->toArray();
        $maps = Map::where('name', 'LIKE', $term.'%')->pluck('name')->toArray();

        return \response()->json(collect($tags, $maps));
    }

    public function getPlaces($name)
    {
        $maps = Map::with('tags')->where('name', $name)->orWhereHas('tags', function ($query) use ($name) {
            return $query->where('name', $name);
        })->get();

        return $maps;
    }
}
