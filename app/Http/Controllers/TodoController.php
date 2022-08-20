<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos=Todo::latest()->paginate(3);
        return view('todos.index', compact('todos'));
    }
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        Todo::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        alert()->success('تسک با موقیت ایجاد شد', 'با تشکر');
        return redirect()->route('todos.index');
    }
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }
    public function update(Todo $todo, Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $todo->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        alert()->success('تسک با موفقیت ویرایش شد', 'با تشکر');
        return redirect()->route('todos.index');
    }
    public function delete(Todo $todo)
    {
        $todo->delete();
        alert()->error('تسک با موفقیت حذف شد', 'دقت کنید');
        return redirect()->route('todos.index');
    }

    public function complate(Todo $todo)
    {
        $todo->update([
            'complated'=>1
        ]);
        alert()->success('تسک با موفقیت انجام شد', 'با تشکر');
        return redirect()->route('todos.index');
    }
}
