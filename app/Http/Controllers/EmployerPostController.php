<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerPost\StoreRequest;
use App\Http\Requests\EmployerPost\UpdateRequest;
use App\Models\Employer;
use App\Models\EmployerPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployerPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = EmployerPost::with('employer:id,name')->latest()->get();
        return view('admin.employer_posts.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employers = Employer::select('id', 'name')->active()->get();
        return view('admin.employer_posts.create', compact('employers'));
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

        $blog = new EmployerPost();
        $file = $request->file('image');
        $image = time() . '.' . $file->getClientOriginalExtension();
        $file->move($blog->getImagePath(), $image);
        $data['image'] = $image;

        EmployerPost::create($data);

        return to_route('admin.employer-posts.index')->with('success', 'Post is created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployerPost $employerPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployerPost $employer_post)
    {
        //
        $employers = Employer::select('id', 'name')->active()->get();
        return view('admin.employer_posts.edit', compact('employer_post', 'employers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, EmployerPost $employerPost)
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
            $request->image->move($employerPost->getImagePath(), $image);
            $data['image'] = $image;
            if (!empty($employerPost->image) && file_exists($employerPost->getImagePath() . $employerPost->image)) {
                unlink($employerPost->getImagePath() . $employerPost->image);
            }
        }

        $employerPost->update($data);

        return to_route('admin.employer-posts.index')->with('success', 'Post is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployerPost $employerPost)
    {
        //
        if (!empty($employerPost->image) && file_exists($employerPost->getImagePath() . $employerPost->image)) {
            unlink($employerPost->getImagePath() . $employerPost->image);
        }
        $employerPost->delete();
        return to_route('admin.employer-posts.index')->with('success', 'Post is deleted!');
    }
}
