@extends('layouts/app_layout')

@php
    use App\Classes\Enc;
    $enc = new Enc();
@endphp

@section('conteudo')
    <div>
        <h3>Lista de Usuários</h3>
        <hr>

        <ul>
        @foreach ($usuarios as $user)
            <li><a href="{{route('main_edit', ['id_usuario' => $enc->encriptar($user->id)])}}">EDIT</a> - {{$user->usuario}}</li>
        @endforeach
        </ul>

    </div>
@endsection
