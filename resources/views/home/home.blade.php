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
            <h3>Hey, {{ $username }}!</h3>
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">
                        <h4>Categories</h4>
                    </div>
                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-md" href="{{ route('create_category') }}">Create a new category</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <tbody>
                            @if (count($categories) > 0)
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <a href="category/{{ $category->category_id }}">{{ $category->category_name }}</a> - {{ $category->category_desc }}
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No categories yet</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
