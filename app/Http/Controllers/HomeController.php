<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Modules\Devices\Entities\Devices;
use Carbon;
use Auth;
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
        return view('home');

    }

    public function home()
    {
        return view('frontend.home');
    }
    public function guide($slug)
    {
        $guide=Devices::with('devicesguide')->where('slug', $slug)->first();

        return view('frontend.guide')->withGuide($guide);
    }

}
