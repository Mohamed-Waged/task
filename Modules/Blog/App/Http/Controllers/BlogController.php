<?php

namespace Modules\Blog\App\Http\Controllers;

use Modules\Blog\App\Models\Blog;
use App\Http\Controllers\Controller;
use Modules\Blog\App\Http\Requests\BlogRequest;
use Modules\Blog\App\Repositories\BlogRepository;

class BlogController extends Controller
{
    protected $blogRepository;
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->blogRepository->getAll();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog::blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        return $this->blogRepository->store($request);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return $this->blogRepository->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog::blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, $id)
    {
        return $this->blogRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->blogRepository->delete($id);
    }
}
