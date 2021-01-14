@extends('layouts.app')
@section('content')


    <div class="container" style="margin-top:50px;">
      
      
     
      <h1 style="margin-top:50px;">ifthen woop list</h1>
      <form action="{{ action('TasksController@create') }}" method="post">
          {{ csrf_field() }}
          {{ method_field('get') }}
          <div class="text-left">
          <button type="submit" class="btn btn-primary">create</button>
          </div>
      </form>
      <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
     
       
       <!--編集ボタン-->
       @foreach ($tasks as $task)
       <tr>
        <tr>
            <td>{{$task->wish}}</td>
        </tr>
         
        <tr>
            <td>{{$task->outcome}}</td>
        </tr>
        
        <tr>
            <td>{{$task->obstacle}}</td>
        </tr>
        
        <tr>
            <td>{{$task->ifthenplan}}</td>
        </tr>
         
      <td><form action="{{ action('TasksController@edit', $task) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('get') }}
          <div class="text-right">
          <button type="submit" class="btn btn-primary">edit</button>
          </div>
      </form>
      </td>
      
      <!--完了ボタン-->
        <td><form action="{{url('/tasks',$task->id)}}"method="post">
           {{ csrf_field() }}
           {{ method_field('delete') }}
           <div class="text-right">
          <button type="submit" class="btn btn-danger">delete</button>
          </div>
         </form>
         </td>
         
       </tr>
       @endforeach
      
     </tbody> 
    </table>
    </div>
    
     <!-- オプションのJavaScript -->
     
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
   
  @endsection

