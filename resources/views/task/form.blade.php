@extends('base')

@section('title', $task->exists ? "Editer une tâche" : "Créer une tâche")

@section('content')
    <form action="{{ $task->exists ? route('task.update', $task) : route('task.store')}}" id="taskForm" class="col-10 m-auto card p-3 vstack gap-2" method="POST">
        @csrf
        @method($task->exists ? "PATCH" : "POST")
        <h2 class="text-center">@yield('title')</h2>
        <hr class="mt-0">
        @include('shared.input', [
                'label' => 'Titre de la tâche',
                'value' => $task->name,
                'name' => 'title',
                'class' => 'col'
            ])

        @include('shared.input', [
                'label' => 'Description de la tâche',
            'value' => $task->description,
            'name' => 'description',
            'type' => 'textarea'
        ])

@include('shared.select', [
    'label' => 'Catégorie',
    'value' => $task->category()->pluck('id'),
    'name' => 'category_id',
    'options' => $categories
])


@include('shared.input', [
                'label' => 'Due_date',
            'value' => $task->due_date,
            'name' => 'due_date',
            'type' => 'datetime-local'
        ])

        <button type="submit" class="btn btn-primary">{{ $task->exists ? "Modifier" : "Créer"}}</button>
    </form>
@endsection
