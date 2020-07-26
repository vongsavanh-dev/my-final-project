<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")->paginate(1);
        } else {
            $posts = Post::paginate(2);
        }
        return view('Activityfontend.index')
            ->with('categorys', Category::all())
            ->with('posts', $posts)
            ->with('tags', Tag::all());
    }
}
