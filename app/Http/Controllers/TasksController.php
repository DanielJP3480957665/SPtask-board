<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;


class TasksController extends Controller
{
  public function index(){
      
      $data = [];
      
      if (\Auth::check()) {
        $user = \Auth::user();
        $tasks = $user->tasks()->orderBy('created_at', 'oldest')->paginate(10);
        
        $data = [
          'user' =>$user,
          'tasks'=>$tasks,
          
          ];
      }
      return view('tasks.index',$data);
  }
  //getでされた時の処理
  public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }
    
  //postされた時の処理
  public function store(Request $request){
    
    $this->validate($request, [
            'wish' => 'required|max:191',
            'outcome' => 'required|max:191',
            'obstacle' => 'required|max:191',
            'ifthenplan' => 'required|max:191',
        ]);
    
    $task = new Task;
    $task->user_id = \Auth::id();
    $task->wish =     $request->wish;
    $task->outcome=   $request->outcome;
    $task->obstacle=  $request->obstacle;
    $task->ifthenplan=$request->ifthenplan;
    
    $task->save();
    return redirect('/');
  }
  
  //編集画面の変移処理
  public function edit(task $task){
    
        
        if(\Auth::id() != $task->user_id){
            return redirect('/');
        }
        
        return view('tasks.edit',[
                'task'=>$task,
            ]);
  }
  //更新処理
  public function update (Request $request,task $task){
   
    $this->validate($request, [
     'wish' => 'required|max:191',
     'outcome' => 'required|max:191',
     'obstacle' => 'required|max:191',
     'ifthenplan' => 'required|max:191',
    ]);
    $task->user_id = \Auth::id();
    $task->wish =     $request->wish;
    $task->outcome=   $request->outcome;
    $task->obstacle=  $request->obstacle;
    $task->ifthenplan=$request->ifthenplan;
    
    $task->save();
    return redirect('/');
  }
 
    
    public function destroy (task $task) {
    if(\Auth::id() != $task->user_id){
            return redirect('/');
        }
    $task->delete();
    return redirect('/');
  }
    
    
  //ユーザー認証
    public function __construct()
    {
        $this->middleware('auth');
    }
}
