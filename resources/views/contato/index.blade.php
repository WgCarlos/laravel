@extends('layout.site')

@section('titulo','Contatos')

@section('conteudo')
    <h3>New view index</h3>

    @foreach($contatos as $contato)
        <p>{{$contato->nome}}</p>
        <p>{{$contato->telefone}}</p>
    @endforeach
@endsection