@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $task->task_name }} in {{ $category_name }}</h4>
                </div>
                <div class="panel-body">
                    {{ $task->task_desc }}
                </div>
            </div>
            <a class="btn btn-warning btn-md" href="{{ route('edit_task', [$task->task_id]) }}">Edit</a>
            <a class="btn btn-default btn-md" href="{{ route('show_category', [$task->category_id]) }}">Back</a>
        </div>
    </div>
</div>

@endsection
