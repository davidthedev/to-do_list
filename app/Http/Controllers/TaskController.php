<?php

namespace App\Http\Controllers;

use App\Task;
use App\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Check if user is authenticated
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create task
     *
     * @param  object $category Category object
     * @return Response
     */
    public function create(Category $category)
    {
        return view('task.create', compact('category'));
    }

    /**
     * Store task
     *
     * @param  object $request Request object
     * @return Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->category_id = $request->category_id;
        $taskName = $request->task_name;
        $task->task_name = $taskName;
        $task->task_desc = $request->task_desc;
        $task->save();

        return redirect()->route('show_category', [$request->category_id])
                            ->with('status', "Successfully created task $taskName!");
    }

    /**
     * Show single task
     *
     * @param  object $task Task object
     * @return Response
     */
    public function show(Task $task)
    {
        $category = Category::find($task->category_id);

        return view('task.show', [
            'task' => $task,
            'category_name' => $task->category->category_name
        ]);
    }

    /**
     * Edit single task
     *
     * @param  object $task Taks object
     * @return Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update single task
     *
     * @param  object $request Request object
     * @param  object $task    Task object
     * @return Response
     */
    public function update(Request $request, Task $task)
    {
        $input = $request->all();

        $task->update($input);

        return redirect()->route('show_category', [$task->category_id])->with('status',
            "Task updated!");
    }

    /**
     * Delete single task
     *
     * @param  object $task Task object
     * @return Response
     */
    public function delete(Task $task)
    {
        $categoryId = $task->category_id;
        $taskName = $task->task_name;

        $task->delete();

        return redirect()->route('show_category', [$categoryId])->with('status',
            "Task $taskName has been successfully deleted!");
    }
}
