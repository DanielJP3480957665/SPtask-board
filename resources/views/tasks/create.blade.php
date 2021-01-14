@extends('layouts.app')
@section('content')


    <div class="container" style="margin-top:50px;">
        @if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li class="ml-4">{{ $error }}</li>
        @endforeach
    </ul>
@endif
      <h1>目標達成率が２倍上がるifthen woop list</h1>
      
      <form action ='{{url('/tasks')}}' method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label> wish </label>
          <input type="text" name="wish" class ="form-control" placeholder="自分の達成したい事" style="max-with:1000px"/>
          <label> outcome </label>
          <input type="text" name="outcome" class ="form-control" placeholder="達成したらどんなメリットがあるか" style="max-with:1000px"/>
          <label> obstacle </label>
          <input type="text" name="obstacle" class ="form-control" placeholder="達成するときに障害になりそうな行動" style="max-with:1000px"/>
          <label> ifthenplan </label>
          <input type="text" name="ifthenplan" class ="form-control" placeholder="障害行動にifthenルールをつける" style="max-with:1000px"/>
        </div>
         {{ csrf_field() }}
           {{ method_field('post') }}
           <div class="text-right">
           <button type="submit" class="btn btn-primary">create</button>
           </div>
       </form>
    </div>
    
     <!-- オプションのJavaScript -->
     
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
   
  @endsection