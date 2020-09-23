<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
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
        $id = 1;
        $config = Config::where('id', $id)->first();
        
        if ($config === null) {
            $config = new Config();
        }

        $config->l2_bet_limit = $request->input('l2_bet_limit');
        $config->s3_bet_limit = $request->input('s3_bet_limit');
        $config->p3_bet_limit = $request->input('p3_bet_limit');
        $config->d = $request->input('d');
        $config->m = $request->input('m');
        $config->md = $request->input('md');

        if ($config->save()) {
            // return view('layouts.user-registration', ['message' => 'success']);
            return redirect()->intended("/dashboard");
            
        } else {
            // return view('layouts.user-registration', ['message' => 'error']);
            return redirect()->intended("/dashboard");
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
