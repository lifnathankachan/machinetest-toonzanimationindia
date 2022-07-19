<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon;
use App\Models\task;
class TaskController extends Controller
{

    public function create(Request $request )
    {
        $title=$request->title;
        $date=$request->date;
        $start_time=$request->start_time;
        $end_time=$request->end_time;
        $user_id=Auth::user()->id;
  
        $store=task::create([
            'title'=>$title,    
            'date'=>$date,
            'start_time'=> $start_time,
            'end_time'=> $end_time,
            'user_id'=> $user_id,
            'status'=>1,
            ]);


       return redirect ('/dashboard');
    }
    
    public function edittask(Request $request)
    {
      $id=$request->id;
      $task=task::where('id',$id)->first();
       return view('edittask')->with('task',$task);
    }
    public function updatetask(Request $request)
    {
      $id=$request->id;
      $task=task::find($id);     
      $task->title = $request->input('title'); 
      $task->date = $request->input('date'); 
      $task->start_time = $request->input('start_time'); 
      $task->end_time = $request->input('end_time');
      
      $task->save();
      return redirect('/dashboard');

    }
  
        public function delete_task(Request $request)
        {
                $id=   $request->id;
                $task=task::where('id', $id)->delete();
                return redirect('/dashboard');
        }
    public function approve(Request $request)
    {
       $id=$request->id;
       $assign=task::find($id);
       $assign->status=0;
       $assign->save();
       return redirect('/dashboard');
    }
    public function reject(Request $request)
    {
        $id=$request->id;
        $assign=task::find($id);
        $assign->status=3;
        $assign->save();
        return redirect('/dashboard');
    }

    public function approveview()
    {
        $record=task::where('status',0)->get();
        return view('approve')->with('record',$record);
    }
    public function rejectview()
    {
        $record=task::where('status',3)->get();
        return view('reject')->with('record',$record);
    }
}
