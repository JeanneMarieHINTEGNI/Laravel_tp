@extends('base')

@section('title', 'Liste des tâches')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('task.create')}}" class="btn btn-primary">Ajouter une tâche</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Due_date</th>
                <th>Statut</th>
                <th  class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->title}}</td>
                    <td>{{$task->due_date}}</td>
                    <td>{{$task->status}}</td>
                    <td >
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{route('task.show', $task)}}" class="btn btn-success">Voir</a>
                            <a href="{{route('task.edit', $task)}}" class="btn btn-primary">Editer</a>
                            <form action="{{route('task.destroy', $task)}}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tasks->links()}}

@endsection