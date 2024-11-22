<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller; // Pastikan untuk mengimpor Controller
use App\Models\Todo\CategoryModel;
use App\Models\Todo\TodoPriorityModel;
use Illuminate\Http\Request;

class TodoPriorityController extends Controller
{
    

   

    public function index(Request $request)
    {
        $query = TodoPriorityModel::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('task_pry', 'LIKE', "%{$search}%");
        }
    
        $data = $query->paginate(3);
    
        
        $categories = CategoryModel::all();
    
        return view('todo.taskpry', compact('data', 'categories'));
    }
    

    
    public function store(Request $request)
    {
        $request->validate([
            'task_pry' => 'required',
            'due_date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        TodoPriorityModel::create([
            'task_pry' => $request->task_pry,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
            'is_done' => false,
        ]);

        return redirect()->route('todopry')->with('success', 'Task berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task_pry' => 'required',
            'due_date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'is_done' => 'required|boolean',
        ]);

        $todo = TodoPriorityModel::findOrFail($id);
        $todo->update([
            'task_pry' => $request->task_pry,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
            'is_done' => $request->is_done,
        ]);

        return redirect()->route('todopry')->with('success', 'Task berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        TodoPriorityModel::where('id', $id)->delete();

        return redirect()->route('todopry')->with('success', 'Berhasil hapus data');
    }


    



public function tasksPryByCategory($id)
{
    
    $category = CategoryModel::with('todos')->findOrFail($id);

    
    return view('todo.taskspry_by_category', compact('category'));
}








}