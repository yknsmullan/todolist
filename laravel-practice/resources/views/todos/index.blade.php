<!DOCTYPE HTML>
<html>
<head>
    <title>ToDoリスト</title>
</head>
<body>

<h1>ToDoリスト</h1>
  <br>
  <form action="{{route('todos.index')}}" method="POST"> 
    @csrf
    <input type="submit"" value="すべて" name="tag">
    <label for="name">すべて</label>
    
    <input type="submit" value="作業中" name="tag">
    <label for="name">作業中</label>
    
    <input type="submit" value="完了" name="tag">
    <label for="name">完了</label>
  </form>


@isset($todos)
@foreach ($todos as $todos)

  <table>
  <tr>
    <th>ID</th>
    <th>コメント</th>
    <th>状態</th>
  </tr>

  <tr>
    <th>{{$loop->iteration}}</th>
    <th>{{ $todos->comment }}</th>
  


    <th> 
      <form action="{{route('todos.update',['id' => $todos->id])}}">    
      @csrf
      @if($todos->tag==="作業中")
      <input type="submit" name="tag" value="作業中">
      @else($todos->tag==="完了")
      <input type="submit" name="tag" value="完了">
      @endif
      </form>
    </th>

    <th>
      <form action="{{ route('todos.delete',[ 'id' => $todos->id ])}}" method="POST">
      @csrf
      @method("DELETE")
      <button type="submit">削除</button>
      </form>
    </th>
  </tr>
  </table>

@endforeach
@endisset


<h2>新規タスクの追加</h2>
  <form action="/todos" method="POST">
      @csrf
      <textarea name="comment" rows="1" cols="25"></textarea>
      <button class="btn"> 追加 </button>
  </form>

</body>
</html>