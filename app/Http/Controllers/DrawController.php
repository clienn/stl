<?php

namespace App\Http\Controllers;

use App\DailyDraw;
use Illuminate\Http\Request;

class DrawController extends Controller
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
        $draw_date = $request->input('draw-date') ? $request->input('draw-date') : date('Y-m-d');
        $daily_draw = DailyDraw::whereDate('created_at', $draw_date)->first();
        
        if ($daily_draw === null) {
            $daily_draw = new DailyDraw();
        }

        $daily_draw->l2_d_draw = $request->input('l2_d_draw');
        $daily_draw->s3_d_draw = $request->input('s3_d_draw');
        $daily_draw->p3_d_draw = $request->input('p3_d_draw');

        $daily_draw->l2_m_draw = $request->input('l2_m_draw');
        $daily_draw->s3_m_draw = $request->input('s3_m_draw');
        $daily_draw->p3_m_draw = $request->input('p3_m_draw');

        $daily_draw->l2_md_draw = $request->input('l2_md_draw');
        $daily_draw->s3_md_draw = $request->input('s3_md_draw');
        $daily_draw->p3_md_draw = $request->input('p3_md_draw');

        if ($daily_draw->save()) {
            // return view('layouts.user-registration', ['message' => 'success']);
            return redirect()->intended("/draws");
            
        } else {
            // return view('layouts.user-registration', ['message' => 'error']);
            return redirect()->intended("/draws");
        }
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
