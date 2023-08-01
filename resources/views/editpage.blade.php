<h1>ToDo List</h1>                                                                                                 
<div>
    <h2>タスクを編集</h2>
    <form method="POST" action="/edition">
        @csrf
        <input type="hidden" name="id" value="{{$edit_Id->id}}">
        <p>
            タスクの名前：<input type="text" name="taskname" value="{{$edit_Id->taskname}}">
        </p>
        
        <p>
            担当者の名前：<input type="text" name="assignedperson" value="{{$edit_Id->assignedperson}}">
        </p>
        <p>
            見積時間(h):<input type="number" name="time" value="{{$edit_Id->time}}">
        </p>
        <p>
            変更者:<input type="text" name="user" value="{{$user}}">
        </p>
        <input type="submit" name="edition" value="修正">
    </form>
    <a href="/todolist">戻る</a>
</div>
