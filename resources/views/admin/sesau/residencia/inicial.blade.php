@extends('layouts.app')

@section('content')
    <h1>Nome: {{ Auth::user()->nome }}</h1>
    <h1>Nome social: {{ Auth::user()->nome_social }}</h1>
    <hr>
    @livewire('admin.sesau.residencia.document-component')
@endsection