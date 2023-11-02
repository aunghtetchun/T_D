<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;


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
    public function admin()
    {
//        $data=Major::orderBy('day', 'ASC')->orderBy('time', 'ASC')->get()->groupBy('day');
        return view('admin-home');
    }
    public function daily(){
        if(auth()->user()->expired_at > \Carbon\Carbon::now()->toDateString()){
        $daily_num = Post::where('type',1)->whereDate('created_at', Carbon::today())
        ->latest()
        ->first();
       
        // return $daily_num;
        return view('user.daily',compact('daily_num'));
        }else{
            return view('home');
        }
    }
    public function birthday(){
        if(auth()->user()->expired_at > \Carbon\Carbon::now()->toDateString()){

      
            $startOfWeek = Carbon::now()->startOfWeek(); // Get the start of the current week
            $endOfWeek = Carbon::now()->endOfWeek();     // Get the end of the current week
            
            $daily_num = Post::where('type', 2)
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->whereBetween('created_at', [Carbon::parse('last monday'), Carbon::parse('this friday')->endOfDay()])
                ->latest()
                ->first();
        return view('user.birthday',compact('daily_num'));
    }else{
        return view('home');
    }
    }
    public function nearest(){
        if(auth()->user()->expired_at > \Carbon\Carbon::now()->toDateString()){

        $daily_num = Post::where('type',3)->whereDate('created_at', Carbon::today())
        ->latest()
        ->first();
        return view('user.nearest',compact('daily_num'));
    }else{
        return view('home');
    }
    }
    public function sample(){
        return view('sample')->with("toast","I'm toast");
    }
}
