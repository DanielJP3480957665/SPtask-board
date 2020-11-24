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
  
  //todo追加する処理
  public function store(Request $request){
    
    $task = new Task;
    $task->user_id = \Auth::id();
    $task->body = $request->body;
    $task->save();
    
    return redirect('/');
  }
  //削除処理
  public function destroy (task $task) {
    $task->delete();
    return redirect('/');
  }
  //編集画面の変移処理
  public function edit($id){
    $task =Task::find($id);
        
        if(\Auth::id() != $task->user_id){
            return redirect('/');
        }
        
        return view('tasks.edit',[
                'task'=>$task,
            ]);
  }
  //更新処理
  public function update (Request $request,task $task){
    $task->body =$request->body;
    $task->save();
    return redirect('/');
  }
  //ユーザー認証
  public function __construct()
    {
        $this->middleware('auth');
    }
}
