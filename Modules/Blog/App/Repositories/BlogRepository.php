<?php

namespace Modules\Blog\App\Repositories;

use App\Trait\uploadImage;
use Modules\Blog\App\Models\Blog;
use Modules\Blog\App\Models\Image;

class BlogRepository
{
    use uploadImage;

    public function getById($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog::blog.show', compact('blog'));
    }

    public function getAll()
    {
        $blogs = Blog::with('image')->get();
        return view('blog::blog.index',compact('blogs'));
    }

    public function store($request)
    {
        $data = $request->validated();
        $blog = Blog::create($data);

        Image::create([
            'path'=> $this->storeImage($request, 'image', 'blog_images'),
            'imageable_type'=> 'Modules\Blog\App\Models\Blog',
            'imageable_id'=>  $blog->id,
        ]);
        return redirect()->route('blog.index')->with('message', 'Blog created successfully');
    }

    public function update($request,$id)
    {
        $data = $request->validated();
        $blog = Blog::findOrFail($id);
        $blog->update($data);
        Image::updateOrCreate(
            ['imageable_id' => $blog->id, 'imageable_type' => 'Modules\Blog\App\Models\Blog'],
            ['path'=> $this->storeImage($request, 'image', 'blog_images')]
        );
        return redirect()->route('blog.index')->with('message', 'Blog Updated successfully');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        // $image = Image::findOrFail($blog->id);
        // $image->delete();
        return redirect()->route('blog.index')->with('message', 'Blog Deleted successfully');
    }

}