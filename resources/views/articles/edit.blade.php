@extends('layouts.app')

@section('content')

 <h1>Edit {!! $article->title !!}</h1>

 <div> {!! Form::model($article, ['method'=>'PATCH', 'route'=>['articles.update',
$article->id]] ) !!}

 @include('articles.form', ['submitButton'=>'Edit Article'])

 {!! Form::close() !!}

@include('errors.list')

@stop
