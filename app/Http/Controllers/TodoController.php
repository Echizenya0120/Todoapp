<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{

    public function list()
    {
        $fin = Todo::orderBy('id','asc')->get();

        $user = Auth::user()->name;

        return view('todolist',["fin" =>$fin, "use" =>$user]);
    }

    public function user()
    {
        $user = Auth::user();
        echo $user->name;
        
        return view('createpage',compact($user));
    }

    public function createpage()
    {
        return view('createpage');
    }

    public function show(Request $request, $id)
    {
        $value = $request->session()->get('key');
    }

    public function creation(Request $request)
    {
        $todo = new Todo();
        $todo->taskname =$request->taskname;
        $todo->assignedperson=$request->assignedperson;
        $todo->time=$request->time;

        $todo->save();

        return redirect('/todolist');
    }
}
