<?php

namespace App\Http\Controllers;

use App\Tags;
use App\Sites;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{

    public function index()
    {
        $tags =  Tags::paginate();
        $sites = Sites::first();
        return view('admin.tags.index', compact('tags', 'sites'));
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);
        
        Tags::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'New Tag Saved!');
    }

    public function edit($id)
    {
        $tag = Tags::findorfail($id);
        $sites = Sites::first();
        return view('admin.tags.edit', compact('tag', 'sites'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $tag_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        Tags::whereId($id)->update($tag_data);

        return redirect()->route('tags.index')->with('status', 'Tag Data Updated!');
    }


    public function destroy($id)
    {
        $tag = Tags::findorfail($id);
        $tag->delete();
        return redirect()->route('tags.index')->with('status', 'Tag Data Deleted!');
    }
}
