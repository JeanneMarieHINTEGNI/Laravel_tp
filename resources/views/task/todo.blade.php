@extends('base')

@section('title', "Article ")

@section('content')
    <h2> Tâche n° {{$task->id}}</h2>
    <article>
        <h2>{{$task->title}}</h2>
        <p>{{$task->description}}</p>
        <p>{{$task->status}}</p>
        <p>Catégorie = {{$task->category->name}}</p>
        
        <a href="{{route('task.update', ['task' => $task->id])}}"> Modifier</a>
        <form action="{{route('task.terminer', $task)}}" method="post">
            @csrf
            @method("patch")
            <button class="btn btn-success">Terminer la tâche</button>
        </form>
    </article>

@endsection