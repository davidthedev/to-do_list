@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $category->category_name }}</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST"
                        action="{{ route('update_category', [$category->category_id]) }}">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="category_name">Name</label>
                            <input type="text" id="category_name" class="form-control"
                                name="category_name" value="{{ $category->category_name }}"/>
                        </div>

                        <div class="form-group">
                            <label for="category_desc">Description</label>
                            <textarea name="category_desc" id="category_desc" class="form-control">{{ $category->category_desc }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                        <a class="btn btn-primary btn-md" href="{{ route('show_category', [$category->category_id]) }}">
                            Back
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
