@extends('layouts.app')

@section('tutulo') 
    Inicio
@endsection

@section('contenido')

  
     <x-listar-posts :posts="$posts"/>

@endsection

