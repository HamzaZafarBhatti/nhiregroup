<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $data = $request->validated();
        $data['post_date'] = now();
        $data['slug'] = Str::slug($data['title'], '-');

        $blog = new Blog();
        $file = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();
        $file->move($blog->getImagePath(), $image);
        $data['image'] = $image;

        Blog::create($data);

        return to_route('admin.blogs.index')->with('success', 'Blog is created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Blog $blog)
    {
        //
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '-');
        if (empty($request->is_active)) {
            $data['is_active'] = 0;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . '.' . $file->getClientOriginalExtension();
            $request->image->move($blog->getImagePath(), $image);
            $data['image'] = $image;
            if (!empty($blog->image) && file_exists($blog->getImagePath() . $blog->image)) {
                unlink($blog->getImagePath() . $blog->image);
            }
        }

        $blog->update($data);

        return to_route('admin.blogs.index')->with('success', 'Blog is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
