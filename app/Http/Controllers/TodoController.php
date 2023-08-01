<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    /**
     *　todo一覧取得
     *
     */
    public function list() 
    {
        //テーブルの情報を取得
        $todos = Todo::orderBy('id','asc')->get();

        //ユーザー情報を取得
        $user = Auth::user()->name;

        //Viewへ情報を送る
        return view('todolist',["todos" =>$todos, "user" =>$user]);
    }

   /**
     *　追加ページ表示
     *
     */

    public function createpage()
    {
        return view('createpage');
    }
    /**
     * 追加ページ情報を送信
     *
     * @param  \Illuminate\Http\Request  $request
     * @return todolistページを表示
     */
    public function creation(Request $request)
    {
        // 新しくインスタンスを作成
        $todo = new Todo();

        // テーブルに各情報を送信
        $todo->taskname =$request->taskname;
        $todo->assignedperson=$request->assignedperson;
        $todo->time=$request->time;

        $todo->save();

        //　todolistページを表示
        return redirect('/todolist');
    }
    /**
     *　追加ページ表示
     *
     * @return 編集ページにidを渡して表示する。
     */
    public function editpage($id)
    {
        $edit_Id = Todo::find($id);
        $user = Auth::user()->name;
        return view('editpage',["edit_Id" => $edit_Id,"user" =>$user]);

    }

    /**
     * 編集内容の送信
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function edition(Request $request)
    {
        //テーブルの情報を取得し、アップデートする
        Todo::find($request->id)->update([
            "taskname" =>$request->taskname,
            "assignedperson" =>$request->assignedperson,
            "time"=>$request->time,
            "user"=>$request->user,

        ]);

        return redirect('/todolist');
    }
   
}
