<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $categorys = Category::paginate(5);
        return view('CATEGORY.index')->with('categorys', Category::all())->with('categorys', $categorys);
 */

        $categorys = Category::all(); // get all data
        $categorys = Category::paginate(5);
        return View('CATEGORY.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CATEGORY.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->validate([

            'name' => 'required|unique:categories',

        ]);

        Category::create(['name' => $request->name]);
        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect()->route('category.index');
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
    public function edit($id)
    {
        $categorys = Category::findOrfail($id);

        return view('CATEGORY.edit')->with('categorys', $categorys);
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
        $data = $request->all(['name']);
        $categorys = Category::find($id);
        $categorys->name = $request->name;
        $categorys->update($data);
        session()->flash('update', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorys = Category::find($id);

        if ($categorys->post->count() > 0) {
            alert()->success('ບໍສາມາດລຶບຂໍ້ມູນໄດ້');
            return redirect()->back();
        }

        $categorys->delete();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect(route('category.index'));
    }

    public function searchcategory(Request $request)
    {

        $search = $request->get('searchcategory');
        if ($search != '') {
            $categorys = DB::table('categories')->where('name', 'like', '%' . $search . '%')
                ->paginate(5);

            return view('CATEGORY.index')->with('categorys', $categorys);
        } else {
            $categorys = Category::paginate(5);
            return view('CATEGORY.index')->with('categorys',  $categorys);
        }
    }
}
