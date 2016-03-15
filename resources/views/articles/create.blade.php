@extends('app')

@section('content')

<h1>Write a New Article</h1>
<hr/>

<form>
    {!! Form::open(['url'=>'articles']) !!}
    <div class="form-group">
    {!!Form::label('title', 'Title:')!!}
       {!! Form::text('title', null, ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!!Form::label('body', 'Body')!!}
        {!!Form::TextArea('body', null, ['class'=>'form-control'])!!}
    </div>

    <div>
        {!!Form::submit('Add Article', ['class'=>'btn btn-primary form-control'])!!}

    </div>

    {!!Form::close() !!}

</form>
@stop

@section('footer')
@stop
