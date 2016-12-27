@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="panel panel-default">
                @if ($category)
                    <div class="panel-heading clearfix">
                        <div class="panel-title pull-left">
                            <h4>{{ $category->category_name }}</h4>
                        </div>
                        <div class="btn-toolbar pull-right">
                            <a class="btn btn-warning btn-md glyphicon glyphicon-pencil" href="{{ route('edit_category', [$category->category_id]) }}"></a>
                            <form method="POST" action="{{ route('delete_category', [$category->category_id]) }}" class="form-dlt-btn">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(count($tasks) === 0)
                            <p>No tasks in this category yet</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Created</th>
                                        <th>Task</th>
                                        <th>Description</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                    <tr>
                                        <td class="col-md-2">
                                            {{ date('d-m-Y', strtotime($task->created_at)) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('show_task', [$task->task_id]) }}">{{ $task->task_name }}</a>
                                        </td>
                                        <td>
                                            {{ $task->task_desc }}
                                        </td>
                                        <td class="col-md-1">
                                            <form method="POST" action="{{ route('delete_task', [$task->task_id]) }}">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <a class="btn btn-primary btn-md" href="{{ $category->category_id }}/task/new">Create Task</a>
                        <a class="btn btn-default btn-md" href="{{ route('home_category') }}">Back</a>
                    </div>
                @else
                    <p>Category does not exist</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
