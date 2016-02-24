@extends('newsletter::layout')

@section('content')

<h2>C'est la page formulaire</h2>
<p>OK?</p>
 
 {!! Form::open(['url' => '/newsletterform']) !!}
 {!! Form::label('nom', 'Entrez votre nom : ') !!}
 {!! Form::text('nom') !!}
 {!! Form::submit('Envoyer !') !!}
 {!! Form::close() !!}

@endsection
