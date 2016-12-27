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
                        <h4>Create a new category</h4>
                    </div>
                    <div class="btn-toolbar pull-right">

                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('store_category') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category_name">Name</label>
                            <input type="text" id="category_name" class="form-control" name="category_name" placeholder="Category name"/>
                        </div>
                        <div class="form-group">
                            <label for="task">Description</label>
                            <textarea name="category_desc" id="task" class="form-control" placeholder="Category description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                        <a class="btn btn-primary btn-md" href="{{ route('home_category') }}">Back to Categories</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
