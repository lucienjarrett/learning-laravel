@extends('layouts.app')

@section('content')

<h1>Write a New Article</h1>
<hr/>

<div>
    {!! Form::open( ['route'=>'articles.store']) !!}
		
   @include('articles.form', ['submitButton'=>'Add Article'])
				{!! Form::close() !!}
</div>
    


@include('errors.list')
</div>
@stop

