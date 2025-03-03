

  @extends('layouts.app')

  @section('title', 'the list of tasks')

  @section ('content')

  <div>
    @forelse ($tasks as $task)
      <a href="{{route('tasks.show', ['id' => $task->id])}}">{{$task->title}}</a>
    @empty
      <p>no tasks</p>
    @endforelse

  </div>

  
  <!-- @isset($name)
  <h1>Homepage</h1>
  <h2>Welcome {{ $name }}</h2>
  <h3>I am too {{ $age }}</h3>
  @endisset -->

  <!-- <div>
    @if (count($tasks))
    <div>There are tasks!</div>
    @else 
    <div>There are no tasks!</div>
    @endif

  </div> -->

  <!-- <div>
    @if(count($tasks)) 
      @foreach ($tasks as $task)
      <h3>{{ $task->id }}</h3>
      <h4>{{ $task->title }}</h4>
      @endforeach
    @else
      <div>no tasks</div>
    @endif
  </div> -->

  @endsection