@extends('layouts.main')

@section('title', 'タスク編集')
    
@section('content')
    
    <h2>タスク編集</h2>

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
    
    <form class="edit-form" action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PATCH')
        <p>
            <label for="title">タイトル</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}">
        </p>
        <p>
            <label for="body">内容</label>
            <textarea name="body" id="" cols="30" rows="10">{{ old('body', $task->body) }}</textarea>
        </p>
        <input type="submit" value="更新">
    </form>
    <button class="show-btn" onclick="location.href='{{ route('tasks.show', $task) }}'">詳細に戻る</button>

@endsection