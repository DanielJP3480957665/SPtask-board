@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="ja">
  
  
  <head>
    <title>達成率が上がるToDoリスト</title>
    <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top:50px;">
      <h1>ToDoリストの追加</h1>
      
      <form action ='{{url('/tasks')}}' method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label> やることを追加してください </label>
          <input type="text" name="body" class ="form-control" placeholder="todo list" style="max-with:1000px;"/>
        </div>
        
       </form>
      <h1 style="margin-top:50px;">Todoリスト</h1>
      <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
        <!-- <thead>
     <tr>
      <th></th><th></th><th></th>
     </tr>
     </thead> -->
     <tbody>
       @foreach ($tasks as $task)
       <!--編集ボタン-->
       <tr>
         <td>{{$task->body}}</td>
      <td><form action="{{ action('TasksController@edit', $task) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('get') }}
          <button type="submit" class="btn btn-primary">編集</button>
      </form>
      </td>
      <!--完了ボタン-->
        <td><form action="{{url('/tasks',$task->id)}}"method="post">
           {{ csrf_field() }}
           {{ method_field('delete') }}
           <button type="submit" class="btn btn-primary">完了</button>
         </form>
         </td>
         <!-- 削除した際にポップ画面で確認をする -->
         <!--<td>
           <a class="del" data-id="{{ $task->id }}" href="#">完了</a>
           <form method="post" action='{{ url('tasks,$task-id') }} id=form_{{ $task->id }}">
           {{ csrf_field() }}
           {{ method_field('delete') }}
           </form>
           
         </td> -->
       </tr>
       @endforeach
     </tbody> 
    </table>
    
    
    <!-- オプションのJavaScript -->
    <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
      'use strict';
      
      var cmds = document.getElementsByClassName('del');
      var i;
      
      for(i = 0 ; i < cmds.length; i++){
        
        cmds[i].addEventListener('click',function(e){
          
          e.preventDefault();
          if (confirm('よろしいですか？')){
            document.getElementById('form_'+this.dataset.id).submit();
          }
          
        }
        );
        
      }
      
      
    </script>
  </body>//endsection
</html>