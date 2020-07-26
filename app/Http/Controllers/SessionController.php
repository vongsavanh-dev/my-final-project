<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Models\Session;
use Illuminate\Http\Request;
use DB;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all(); // get all data
        $sessions = Session::paginate(5);
        return View('SESSION.index', compact('sessions'));
        return view('SESSION.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SESSION.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRequest $request)
    {
        $request->validate([

            'session_name' => 'required',

        ]);
        $id = IdGenerator::generate(['table' => 'sessions', 'field' => 'session_id', 'length' => 10, 'prefix' => 'SES-']);
        Session::create([

            'session_id' => $id,
            'session_name' => $request->session_name,
        ]);
        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect(route('session.index'));
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
        $sessions = Session::findOrfail($id);
        return view('SESSION.edit')->with('sessions', $sessions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionRequest $request, $id)
    {
        $data = $request->all(['session_name']);
        $sessions = Session::find($id);
        $sessions->session_name = $request->session_name;
        $sessions->update($data);
        session()->flash('update', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
        return redirect(route('session.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sessions = Session::find($id);
        $sessions->delete();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect(route('session.index'));
    }
}
