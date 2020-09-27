<?php

namespace App\Http\Controllers\API;

use App\Draw;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $draw = Draw::whereDate('created_at', date('Y-m-d'))->first();

        if ($draw === null) {
            $draw = new Draw();
        }

        $draw->user_id = $request->input('user_id');
        $draw->type = $request->input('type');


        $time = $request->input('time');
        $data = json_encode($request->input('data'));
        
        if ($time == 'M'){
            $draw->M = $data;
        } else if ($time == 'D') {
            $draw->D = $data;
        } else {
            $draw->MD = $data;
        }

        if ($draw->save()) {
            return response(['status' => true]);
        }

        return response(['status' => false]);
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
    }
}
