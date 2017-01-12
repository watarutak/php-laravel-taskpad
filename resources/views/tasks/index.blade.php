@extends('layouts.app')

@section('content')
@include('common.errors')
<form action="{{ url('task') }}" method="POST">
    {{ csrf_field() }}
    <label for="task-name">Task</label>
    <input type="text" name="name" id="task-name">
    <button type="submit">Add Task</button>
</form>
@if (count($tasks) > 0)
    Current Tasks
    <table>
        <thead>
            <th>Task</th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>
                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


@endsection

