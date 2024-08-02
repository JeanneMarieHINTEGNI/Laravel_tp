<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

        $tasks = Task::paginate(5);

        return view('task.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        $task = new Task();
        return view("task.form", [
            'task' => $task,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(TaskFormRequest $request)
    {   
        //dd($request->validated());
        $task = Task::create($request->validated());
        $task->category_id=$request->validated()['category_id'];
        $task->save();
        return redirect()->route('task.index')->with('success','La tâche a été créée avec succès');
    }


    public function show(Task $task)
    {
        return view("task.todo", [
            'task' => $task
        ]);
    }

    public function edit(Task $task)
    {
        return view("task.form", [
            'task' => $task
        ]);
    }

    public function update(TaskFormRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->category_id=$request->validated()['category_id'];
        $task->save();
        return redirect()->route('task.index')->with('success','La tâche a bien été modifiée');
    }

    public function terminer(Task $task)
    {
        $task->status="Terminé";
        $task->save();
        return redirect()->route('task.show', ['task' => $task])->with('success','La tâche a bien été terminée');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success','La tâche a bien été supprimée');
    }
}
