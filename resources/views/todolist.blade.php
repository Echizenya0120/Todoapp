<h1>ToDo List</h1>                                                                                                 
<div>
    <h2>タスクの一覧</h2>
    <a href="/create_page">タスクを追加</a>
    <table border="1">
        <tr>
            <th>タスクの名前</th>
            <th>担当者の名前</th>
            <th>時間(h)</th>
            <th>ユーザー名</th>
            <th colspan="2">操作</th>
        </tr>
        @foreach($fin as $todo)
        <tr>
            <td>{{$todo->taskname}}</td>
            <td>{{$todo->assignedperson}}</td>
            <td>{{$todo->time}}</td>
            <td>{{$use}}</td>
            <td><a href="/edit-page/{{$todo->id}}">編集</a></td>
            <td><a href="/delete-page/{{$todo->id}}">削除</a></td>
        </tr>
        @endforeach
    </table>
</div>
