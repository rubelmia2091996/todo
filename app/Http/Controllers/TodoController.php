<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
class TodoController extends Controller
{
    public function index()
    {
        $datas = Todo::all();
        return view('dashboard', compact('datas'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_datetime' => 'required|date',
        ]);

        $todo = Todo::create($request->all());

        return redirect('/todos');
    }

    public function show(Todo $todo)
    {
    }
    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'due_datetime' => 'sometimes|date',
        ]);
        $todo->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'due_datetime'=> $request->due_datetime,
            'email_sent'=>false
        ]);

        return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/todos');
    }
}
