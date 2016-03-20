@extends('app')
	
@section('content')

	<h1>Edit {!! $article->title !!}</h1>

	<div>
	    {!! Form::model($article, ['method'=>'PATCH', 'route'=>['articles.update', $article->id]] ) !!}
		
	    <div class="form-group">
	    {!! Form::label('title', 'Title:') !!}
	       {!! Form::text('title', null, ['class'=>'form-control']) !!}

	    </div>
	    <div class="form-group">
	        {!! Form::label('body', 'Body') !!}
	        {!! Form::TextArea('body', null, ['class'=>'form-control']) !!}
	    </div>
	    <div class="form-group">
	        {!! Form::label('published_at', 'Published On') !!}
	        {!! Form::input('date','published_at',date('Y-m-d'), ['class'=>'form-control']) !!}
	    </div>

	    <div>
	        {!! Form::submit('Edit Article', ['class'=>'btn btn-primary form-control']) !!}
					{!! Form::close() !!}
	    </div>
    


	@if ($errors->any())
		<ul class="alert alert-danger" style="margin-top:20px">
			@foreach($errors->all() as $error)
			<li> {{ $error }}</li>
			@endforeach 
		</ul>
	
	@endif


@stop 
	