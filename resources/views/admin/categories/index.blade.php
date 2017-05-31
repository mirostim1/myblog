@extends('layouts.admin')


@section('content')


    @if(session('category_created'))
        <div class="alert alert-success">{{session()->pull('category_created')}}</div>
    @endif


    @if(session('category_updated'))
        <div class="alert alert-success">{{session()->pull('category_updated')}}</div>
    @endif

    @if(session('category_deleted'))
        <div class="alert alert-success">{{session()->pull('category_deleted')}}</div>
    @endif

    <h1>Categories</h1>
    <p>Section contains list of all categories. You can view, edit or delete them.</p>
    <hr>

    @include('includes.form_error')

    <div class="col-md-6">
        <div class="form-group">
        {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']) !!}
            {!! Form::label('name', 'Category Name*') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
            {!! Form::submit('Create Category', ['class'=>'btn btn-success']) !!}
        <div class="form-group">
            {!! Form::close() !!}
        </div>
    </div>

    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#Id</th>
                <th>Category</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans(): 'N/A'}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans(): 'N/A'}}</td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
                        <td>{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}</td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@stop



