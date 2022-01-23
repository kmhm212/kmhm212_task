@extends('layouts.main')

@section('title', 'タスク一覧')
    
@section('content')

    <h2>タスク詳細</h2>

    <p>
        【タスク】<br>
        {{ $task->title }}
    </p>
    <p>
        【内容】<br>
        {{ $task->body }}
    </p>
    <div class="btn-group">
        <button onclick="location.href='/tasks'">一覧に戻る</button>
        <button onclick="location.href='{{ route('tasks.edit', $task) }}'">編集する</button>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
        </form>
    </div>

@endsection