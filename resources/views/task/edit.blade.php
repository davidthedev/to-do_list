@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $task->task_name }}</h4>
                </div>
                <div class="panel-body">

                    <form role="form" method="POST"
                        action="{{ route('update_task', ['task_is' => $task->task_id]) }}">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="task_name">Name</label>
                            <input type="text" id="task_name" class="form-control"
                                name="task_name" value="{{ $task->task_name }}"/>
                        </div>

                        <div class="form-group">
                            <label for="task_desc">Description</label>
                            <textarea name="task_desc" id="task_desc" class="form-control">{{ $task->task_desc }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                        <a class="btn btn-primary btn-md" href="{{ route('show_category', [$task->category_id]) }}">
                            Back
                        </a>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>

@endsection
