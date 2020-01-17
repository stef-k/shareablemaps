<?php

namespace App\Http\Controllers;

use App\Tag;

class TagController extends Controller
{
    public function tags()
    {
        $tags = Tag::pluck('name')->toArray();

        return \response()->json($tags);
    }

    public function deleteTag($id)
    {
        Tag::where('id', $id)->delete();
        Tag::doesntHave('maps')->delete();

        return \response()->json('The tag has been deleted!');
    }
}
