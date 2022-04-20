<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\Pembayaran;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'user' => User::find(auth()->user()->id),
            'pembayaran' => Pembayaran::orderBy('id', 'desc')->paginate(3),
        ];
      
        return view('dashboard.index', $data);
        
    }
}
