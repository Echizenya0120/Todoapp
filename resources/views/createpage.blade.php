<h1>ToDo List</h1>                                                                                                 
<div>
    <h2>タスクを追加</h2>
    <form method="POST" action="/creation">
        @csrf
        <p>
            タスクの名前：<input type="text" name="taskname">
        </p>
        
        <p>
            担当者の名前：<input type="text" name="assignedperson">
        </p>
        <p>
            見積時間(h):<input type="number" name="time">
        </p>
        <input type="submit" name="creation" value="追加">
    </form>
    <a href="/todolist">戻る</a>
</div>
