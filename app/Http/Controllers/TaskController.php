<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        // ログイン後の画面を表示するよう対応
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // tasksディレクトリ直下のcreate.blade.phpを表示
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required'
        ]);
        Task::create($request->all());
        return view('dashboard')->with('success', 'タスクが作成されました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        // tasksディレクトリ直下のedit.blade.phpを表示
        return view('tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $task->update($request->all());
        return redirect()->route('dashboard')->with('success', 'タスクの更新ができました！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        // タスクの削除
        $task->delete();

        // 削除したメッセージと共に、一覧画面へ戻る
        return redirect()->route('dashboard')->with('success', 'タスクを削除しました！');
    }
}
