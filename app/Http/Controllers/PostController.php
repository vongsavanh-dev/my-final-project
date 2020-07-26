<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('POST.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('POST.create')->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $image = $request->image->store('postimage');
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'category_id' => $request->category,
        ]);
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('POST.edit')->with('post', $post)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data1 = $request->all(['title', 'description', 'content']);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image->store('postimage');
            $post->deleteImage();
            $data1['image'] = $image;
        }
        if ($request->category) {
            $data1['category_id'] = $request->category;
        }
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }



        $post->update($data1);
        session()->flash('update', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
        return redirect(route('post.index'));

        /*  dd($request->all()); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        $post->tags()->detach($post->post_id);
        $post->deleteImage();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect('/post');
    }
}
