@extends('layouts.app')

@section('content')

<h1>タスク一覧</h1>

@if(count($tasks) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>状態</th>
                <th>タスク</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{!! link_to_route("tasks.show", $task->id, ["id" => $task->id]) !!}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->content }}</td>
                <td>
                    @if (Auth::id() == $task->user_id)
                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

{!! link_to_route("tasks.create", "新規タスクの作成", null, ["class" => "btn btn-primary"]) !!}

@endsection