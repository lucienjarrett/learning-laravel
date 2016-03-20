@extends('app')

@section('content')

<h1>Write a New Article</h1>
<hr/>

<div>
    {!! Form::open( ['route'=>'articles.store']) !!}
		
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
        {!! Form::submit('Add Article', ['class'=>'btn btn-primary form-control']) !!}
				{!! Form::close() !!}
    </div>
    
</div>
@stop

