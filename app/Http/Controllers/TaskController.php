<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function index(){
$tasks=Task::latest()->get();
return view('tasks.index',compact('tasks'));
   }

public function create(){

    return view('tasks.create');
}

public function store(Request $request){
$request->validate([
'title'=>'required|String|max:255',
'description'=>'nullable|String'
]);
$task = Task::create([
    'title' => $request['title'],
    'description' => $request['description'],
]);
return redirect()->route('tasks.index')->with('success','task completed successfully');
}

public function edit(Task $task){

return view('tasks.edit',compact('task'));
}

public function update(Request $request, $id){

  $validated=  $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);
    $task = Task::findOrFail($id);
    $task->update($validated);

    return redirect()->route('tasks.index')->with('success', 'تم تعديل المهمة بنجاح');
}

public function destroy(Task $task)
{
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'تم حذف المهمة');
}

public function toggleComplete(Task $task)
{
    $task->is_completed = !$task->is_completed;
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'تم تحديث حالة المهمة');
}

public function show($id)
{
    // مثال لاسترجاع المهمة من قاعدة البيانات باستخدام الـ id
    $task = Task::findOrFail($id);

    // عرض المهمة أو إرجاعها
    return view('tasks.show', compact('task'));
}

}
