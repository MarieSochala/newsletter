@extends('newsletter::layout')

@section('content')

<h2>C'est la page formulaire</h2>
<p>OK?</p>
 
 {!! Form::open(['url' => '/newsletters']) !!}
 {!! Form::label('title', 'Entrez le titre de vitre email : ') !!}
 {!! Form::text('title') !!}
 {!! Form::label('content', 'Entrez le contenu du mail EN MARKDOWN : ') !!}
 {!! Form::textarea('content') !!}
 {!! Form::submit('Envoyer !') !!}
 {!! Form::close() !!}


@endsection
