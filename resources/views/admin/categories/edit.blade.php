@extends('layouts.admin')


@section('content')

    <h1>Edit Category</h1>
    <p>Edit chosen category.</p>
    <hr>

    @include('includes.form_error')

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}
            {!! Form::label('name', 'Category Name*') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Update Category', ['class'=>'btn btn-success']) !!}
        <div class="form-group">
            {!! Form::close() !!}
        </div>
    </div>

@stop

