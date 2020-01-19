<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tags()
    {
        $tags = Tag::pluck('name')->toArray();

        return \response()->json($tags);
    }

    public function showTags()
    {
        $tags = Tag::all();

        return view('admin.tags', ['tags' => $tags]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');

        $tag = Tag::find($id);
        $old = $tag->name;

        Tag::where('id', $id)->update([
            'name' => $name
        ]);

        return \response()->json('The tag with old name '. $old . ' has been saved as ' . $name, 200);
    }

    public function deleteTag($id)
    {
        Tag::where('id', $id)->delete();
        Tag::doesntHave('maps')->delete();

        return \response()->json('The tag has been deleted!');
    }
}
