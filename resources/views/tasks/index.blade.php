@extends('layouts.main')

@section('title', 'タスク一覧')
    
@section('content')
    
    <h2>タスク一覧</h2>
    @if ($tasks)
        @foreach ($tasks as $task)
            <ul class="tasks">
                <li>
                    <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
                    </form>
                </li>
            </ul>
        @endforeach
    @endif
    <hr>
    <h2>新規タスク追加</h2>

    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="/tasks" method="POST">
        @csrf
        <p>
            <label for="title">タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}">
        </p>
        <p>
            <label for="body">内容</label>
            <textarea name="body" id="" cols="30" rows="10">{{ old('body') }}</textarea>
        </p>
        <input type="submit" value="Create Task">
    </form>

    @endsection