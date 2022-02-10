<?php

namespace App\Http\Controllers;

use App\Models\Estimator;
use Illuminate\Http\Request;

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

    public function get_online_status()
    {
        $totalStaffs = 0;
        $onlineStaffs = 0;
        $totalEstimators = Estimator::count();
        $onlineEstimators = Estimator::where(['is_user_login'=> 1])->count();
        $response = array(
                        'online_staff' => $onlineStaffs,
                        'online_staff' => $totalStaffs,
                        'online_estimator' => $onlineEstimators,
                        'no_of_estimator' => $totalEstimators
                    );
        return $response;
    }
}
