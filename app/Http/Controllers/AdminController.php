<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function validateRequest($request) {
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
        ],[
            'title.required' => 'title is required',
            'title.max' => 'title must not exceed 50 characters',
            'content.required' => 'content is required',
        ]);
    }

    function index()
    {
        $blogs = Blog::orderByDesc('id')->paginate(5);
        return view('blog', compact('blogs'));
    }

    function about()
    {
        $name = "Phumrapee Soenvanichakul";
        $date = "14/04/2024";
        return view('about', compact('name', 'date'));
    }

    function create()
    {
        return view('form');
    }

    function insert(Request $request)
    {
        $this->validateRequest($request);
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        Blog::insert($data);
        return redirect()->back();
    }

    function update(Request $request, $id) {
        $this->validateRequest($request);
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        Blog::find($id)->update($data);
        return redirect()->route('blog');
    }

    function delete($id) {
        Blog::find($id)->delete();
        return redirect()->back();
    }

    function change($id) {
        $blog = Blog::find($id);
        Blog::find($id)->update(['status' => !$blog->status]);
        return redirect()->back();
    }

    function edit($id) {
        $blog = Blog::find($id);
        return view('edit', compact('blog'));
    }
}
