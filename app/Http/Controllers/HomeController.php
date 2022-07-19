<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\task;
class HomeController extends Controller
{
    public function check()
    {
        // \Auth::logout();
        if (Auth::check()) {

            if(Auth::user()->type == "staff"){
            $user_id=Auth::user()->id;
            $record=task::with('user')->where('user_id',$user_id)->get();
            return view('staffdashboard')->with('record',$record);
            
            }else if(Auth::user()->type == "supervisor"){
                $record=task::where('status',1)->get();
                return view('supervisordashboard')->with('record',$record);
            }  

          }  
          
    }

    public function addtask()
    {
        
        return view('addtask');
    }

}
