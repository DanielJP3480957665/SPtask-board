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
    <h1>if then woop list<h1>

    <form action='{{ url('/tasks',$task->id) }}' method="post">
      {{csrf_field()}}
      {{ method_field('patch')}}
   <div class="form-group">
    
    <label>wish</label>
    <input type="text" name="wish"class="form-control" value="{{ $task->wish }}" style="max-width:1000px">
    <label>outcome</label>
    <input type="text" name="outcome"class="form-control" value="{{ $task->outcome }}" style="max-width:1000px">
    <label>obstacle</label>
    <input type="text" name="obstacle"class="form-control" value="{{ $task->obstacle }}" style="max-width:1000px">
    <label>ifthenplan</label>
    <input type="text" name="ifthenplan"class="form-control" value="{{ $task->ifthenplan }}" style="max-width:1000px">
    
  </div>
  <button type="submit" class="btn btn-primary" style="max-width:1000px">更新する</button>
</form>

</div>
  <!-- オプションのJavaScript -->
  <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
    (function() {
  'use strict';

  var cmds = document.getElementsByClassName('del');
  var i;

  for (i = 0; i < cmds.length; i++) {
    cmds[i].addEventListener('click', function(e) {
      e.preventDefault();
      if (confirm('are you sure?')) {
        document.getElementById('form_' + this.dataset.id).submit();
      }
    });
  }

})();
</script>
 

@endsection