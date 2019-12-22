<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boards;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Boards::all();

        return response(['success' => true, 'result' => $data, 'error' => null], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        if (Boards::create(['creator_id' => $request->creator_id, 'name' => $request->name])){
            return response(['success' => true, 'result' => $request], 200);
        }

        return response(['success' => false, 'result' => $request], 500);
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
        //
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
        //
        $boards = Boards::find($id);


        if (!$boards){
            return response(['message' => 'id tidak dikenali!'], 500);
        } else {
            $boards->creator_id = $request->creator_id;
            $boards->name = $request->name;
    
            $boards->save();
    
            return response(['success' => true, 'result' => $boards, 'message' => 'Board berhasil diubah', 'error' => null]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $boards = Boards::find($id);

        if ($boards->delete()) {
            return response($id, 200);
        }

        return response($id, 500);
    }
}
