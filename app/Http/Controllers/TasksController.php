<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;


class TasksController extends Controller
{
  public function index(){
      $tasks = Task::all();
      return view('tasks.index')->with('tasks',$tasks);
  }
  
  //todo追加する処理
  public function store(Request $request){
    $task = new Task();
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
  public function edit(task $task){
    return view('tasks.edit')->with('task',$task);
  }
  //更新処理
  public function update (Request $request,task $task){
    $task->body =$request->body;
    $task->save();
    return redirect('/');
  }
}
