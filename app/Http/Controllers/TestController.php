<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::table('users')->get();
        Log::info($users);
        Log::info('test');
        dd('test');

        return;
    }
}
