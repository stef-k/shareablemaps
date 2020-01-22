<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewMapRequest;
use App\Map;
use App\Tag;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function mapslist()
    {
        $maps = Map::with('tags')->get();

        return view('admin.maplist', ['maps' => $maps]);
    }

    public function mapsListData()
    {
        $maps = Map::with('tags')->get();

        return \response()->json($maps);
    }

    public function publicMaptile($id)
    {
        $map = Map::with('tags')->findOrFail($id);

        return view('single-maptile', ['map' => $map]);
    }

    public function showMap($id)
    {
        $map = Map::with('tags')->findOrFail($id);

        return view('admin.editmap', ['map' => $map]);
    }

    public function newMap()
    {
        return view('admin.newmap');
    }

    public function saveNewMap(NewMapRequest $request)
    {
        $url           = $request->input('url');
        $name          = $request->input('name');
        $suggestedDays = $request->input('suggestedDays');
        $details       = $request->input('details');
        $tags          = $request->input('tags');

        $map                 = new Map();
        $map->url            = $url;
        $map->name           = $name;
        $map->suggested_days = $suggestedDays;
        $map->details        = $details;

        $map->save();

        if (!empty($tags)) {
            foreach ($tags as $tag) {
                if ($tag !== '') {
                    $t = Tag::firstOrCreate(['name' => \Str::title($tag)]);
                    $map->tags()->attach($t);
                }
            }
        }

        \flash('Map with name: '.$map->name.' and ID: '.$map->id.' has been successfully created.')->info();

        return \response()->json([
            'message' => 'Map with name: '.$map->name.' and ID: '.$map->id.' has been successfully created.',
            'mapid'   => $map->id,
        ], 200);
    }

    public function deleteMap($id)
    {
        Map::where('id', $id)->delete();
        Tag::doesntHave('maps')->delete();

        return \response()->json('The map has been deleted!');
    }

    public function saveMap(Request $request)
    {
        $id            = $request->input('id');
        $url           = $request->input('url');
        $name          = $request->input('name');
        $suggestedDays = $request->input('suggestedDays');
        $details       = $request->input('details');

        $map = Map::find($id);
        if ($map) {
            $map->url            = $url;
            $map->name           = $name;
            $map->suggested_days = $suggestedDays;
            $map->details        = $details;

            $map->save();

            $tags = $request->input('tags');

            if (!empty($tags)) {
                foreach ($tags as $tag) {
                    if ($tag !== '') {
                        $t = Tag::firstOrCreate(['name' => \Str::title($tag)]);
                        if ($map) {
                            if (!$t->maps()->exists()) {
                                try {
                                    $map->tags()->attach($t);
                                } catch (\Throwable $th) {
                                    // do nothing we won't reach here after all the above checks
                                }
                            }
                        }
                    }
                }
            }

            return \response()->json('Map with name: '.$map->name.' and ID: '.$id.' has been successfully saved.', 200);
        }
    }
}
