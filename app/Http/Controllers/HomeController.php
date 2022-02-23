<?php

namespace App\Http\Controllers;

use App\Models\Dolist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()['id'];
        $result = Dolist::where('user_id',$id)->get();
        return view('home',[
            'result' => $result,
        ]);
    }

    public function welcome(){

        $result = Dolist::paginate(5);
        return view('welcome',[
            'result' => $result,
        ]);
    }
}
