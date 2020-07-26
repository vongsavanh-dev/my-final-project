<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('Activityfontend.show')->with('post', $post);
    }

    public function showcategory(Category $category)
    {
        return view('Activityfontend.showcategory')
            ->with('categorys', Category::all())
            ->with('tags', Tag::all())
            ->with('category', $category)
            ->with('posts', $category->post()->paginate(2));
    }
    public function showtag(Tag $tag)
    {
        return view('Activityfontend.showtag')
            ->with('categorys', Category::all())
            ->with('tags', Tag::all())
            ->with('tag', $tag)
            ->with('posts', $tag->posts()->paginate(2));
    }
}
