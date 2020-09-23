<?php

namespace App\Http\Controllers;

use App\User;
use App\Draw;
use App\DailyDraw;
use App\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::select("users.*")->paginate(10);
        return view('layouts.user-list', ['data' => $users]);
    }

    public function registration($id = 0) {
        $user = User::select('users.*')->where('users.id', '=', $id)->get();
        return view('layouts.user-registration',  ['user' => $user]);
    }

    public function dashboard() {
        $config = Config::All();
        return view('layouts.dashboard', ['config' => $config]);
    }

    public function draws(Request $request) {
        $date = $request->query('date') ? $request->query('date') : date('Y-m-d');

        $draws = Draw::whereDate('created_at', '=', $date)->get();
        $daily_draw = DailyDraw::whereDate('created_at', '=', $date)->first();
        
        $hits = [
            'd' => ['l2' => [], 's3' => [], 'p3' => []],
            'm' => ['l2' => [], 's3' => [], 'p3' => []],
            'md' => ['l2' => [], 's3' => [], 'p3' => []]
        ];

        $gross = [
            'd' => ['l2' => 0, 's3' => 0, 'p3' => 0],
            'm' => ['l2' => 0, 's3' => 0, 'p3' => 0],
            'md' => ['l2' => 0, 's3' => 0, 'p3' => 0]
        ];

        foreach ($draws as $draw) {
            $t = $draw->type;
            $times = ['d' => $draw->D, 'm' => $draw->M, 'md' => $draw->MD];
            
            foreach ($times as $dk => $dv) {
                if ($dv) {
                    $arr = json_decode($dv, true);
                
                    foreach($arr as $key => $val) {
                        if (!array_key_exists($key, $hits[$dk][$t])) $hits[$dk][$t][$key] = 0;

                        $hits[$dk][$t][$key] += $val[0];
                        $gross[$dk][$t] += $val[1];
                    }
                }
            }
        }

        return view('layouts.draws', ['draws' => ['hits' => $hits, 'gross' => $gross], 'daily_draw' => $daily_draw]);
    }

    public function getUserList(Request $request) {
        $search = $request->query('search');

        $users = User::select('users.*');

        if ($search) {
            $users = $users->where('users.lastname', 'LIKE', "%$search%")
                        ->orWhere('users.firstname', 'LIKE', "%$search%")
                        ->orWhere('users.middlename', 'LIKE', "%$search%")
                        ->orWhere('users.role', 'LIKE', "%$search%");
        }

        $users = $users->orderBy('users.lastname')->paginate(10);

        return view('ajax-forms.user-main-list',  ['data' => $users]);
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
        $user = $request->isMethod('put') ? 
            User::findOrFail($request->id) : new User;

        $id = $request->id ? $request->id : 0;

        $user->lastname = $request->input('lastname');
        $user->firstname = $request->input('firstname');
        $user->middlename = $request->input('middlename');
        $user->username = $request->input('username');

        $password = Hash::make($request->input('password'));

        if ($password)
            $user->password = $password;
        
        $user->role = $request->input('role');
        $privileges = $request->input('chk-privilege');
        
        $value = 0;
        foreach ($privileges as $privilege) {
            $value |= $privilege;
        }

        $user->privileges = $value;

        if ($user->save()) {
            // return view('layouts.user-registration', ['message' => 'success']);
            return redirect()->intended("/user/$id/registration");
            
        } else {
            // return view('layouts.user-registration', ['message' => 'error']);
            return redirect()->intended("/user/$id/registration");
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
