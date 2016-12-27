@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">
                        <h4>Create a new task</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('store_task', [$category->category_id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="task_name">Name</label>
                            <input type="text" id="task_name" class="form-control" name="task_name" placeholder="Task name"/>
                        </div>
                        <div class="form-group">
                            <label for="task_desc">Description</label>
                            <textarea name="task_desc" id="task_desc" class="form-control" placeholder="Task description"></textarea>
                        </div>
                        <input type="hidden" name="category_id" value="{{ $category->category_id }}"/>
                        <button type="submit" class="btn btn-success">Add</button>
                        <a class="btn btn-primary btn-md" href="{{ route('home_category') }}">Back to Categories</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
